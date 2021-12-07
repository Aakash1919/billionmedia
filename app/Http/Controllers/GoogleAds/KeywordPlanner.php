<?php

namespace App\Http\Controllers\GoogleAds;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V9\ResourceNames;
use Google\Ads\GoogleAds\V9\Enums\KeywordPlanNetworkEnum\KeywordPlanNetwork;
use Google\Ads\GoogleAds\V9\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V9\Services\KeywordAndUrlSeed;
use Google\Ads\GoogleAds\V9\Services\KeywordSeed;
use Google\Ads\GoogleAds\V9\Services\UrlSeed;
use Google\ApiCore\ApiException;
use Auth;

class KeywordPlanner extends BaseController
{
    public function __construct() {
        $this->middleware('auth');
              
    }

    public function index() {
        $refreshToken = Auth::user()->google_refresh_token;
        return view('keywordPlanner',compact('refreshToken'));
    }

    public function main(Request $request)
    {
        $refreshToken = Auth::user()->google_refresh_token;
        $message = '';
        if($request->has('keyword') && isset($refreshToken)) {
            $oAuth2Credential = (new OAuth2TokenBuilder())->withClientId(env('CLIENT_ID'))->withClientSecret(env('CLIENT_SECRET'))->withRefreshToken($refreshToken)->build();
            $googleAdsClient = (new GoogleAdsClientBuilder())->withDeveloperToken(env('DEVELOPER_TOKEN'))->withOAuth2Credential($oAuth2Credential)->build();
            $keyword = explode(',',$request->get('keyword')) ;
            $url = $request->get('Url');
            try {
                $keywordResponse = $this->getKeywordsDetails($googleAdsClient,(int)env('CUSTOMER_ID'), [1007740],1000, $keyword , $url);
                return view('keywordPlanner', compact('keywordResponse','refreshToken'));
            } catch (GoogleAdsException $googleAdsException) {
                foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
                    $message .= 'Error Code : '.$error->getErrorCode()->getErrorCode().', Message : '.$error->getMessage().'<br>';
                }
                return redirect('keyword-planner')->with('status', $message); 
            } catch (ApiException $apiException) {
                return redirect('keyword-planner')->with('status', 'ApiException was thrown with message '.$apiException->getMessage()); 
            }
        }else {
            return redirect('keyword-planner')->with('status', 'Either Keyword is empty or connect to google ads'); 
        }
    }

    public function getKeywordsDetails(GoogleAdsClient $googleAdsClient, int $customerId, array $locationIds, int $languageId, array $keywords,?string $pageUrl
    ) {
        $responseArray = array();
        $keywordPlanIdeaServiceClient = $googleAdsClient->getKeywordPlanIdeaServiceClient();
        if (empty($keywords) && is_null($pageUrl)) {
            return redirect('keyword-planner')->with('status', 'At least one of keywords or page URL is required, but neither was specified.'); 
        }
        $requestOptionalArgs = [];
        if (empty($keywords)) {
            $requestOptionalArgs['urlSeed'] = new UrlSeed(['url' => $pageUrl]);
        } elseif (is_null($pageUrl)) {
            $requestOptionalArgs['keywordSeed'] = new KeywordSeed(['keywords' => $keywords]);
        } else {
            $requestOptionalArgs['keywordAndUrlSeed'] =
                new KeywordAndUrlSeed(['url' => $pageUrl, 'keywords' => $keywords]);
        }

        $geoTargetConstants =  array_map(function ($locationId) {
            return ResourceNames::forGeoTargetConstant($locationId);
        }, $locationIds);

        $response = $keywordPlanIdeaServiceClient->generateKeywordIdeas([
                'language' => ResourceNames::forLanguageConstant($languageId),
                'customerId' => $customerId,
                'geoTargetConstants' => $geoTargetConstants,
                'keywordPlanNetwork' => KeywordPlanNetwork::GOOGLE_SEARCH_AND_PARTNERS
            ] + $requestOptionalArgs
        );
        foreach ($response->iterateAllElements() as $result) {

            $amc = is_null($result->getKeywordIdeaMetrics()) ? 0 : $result->getKeywordIdeaMetrics()->getAvgMonthlySearches();
            $competition = is_null($result->getKeywordIdeaMetrics()) ? 0 : $result->getKeywordIdeaMetrics()->getCompetition();
            array_push($responseArray, ['keyword'=>$result->getText(), 'searches'=>$amc, 'competition'=>$competition]);
        }
       return $responseArray ?? [];
    }
}
