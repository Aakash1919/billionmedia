<?php

namespace App\Http\Controllers\GoogleAds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V9\ResourceNames;
use Google\Ads\GoogleAds\V9\Enums\KeywordPlanNetworkEnum\KeywordPlanNetwork;
use Google\Ads\GoogleAds\V9\Services\KeywordAndUrlSeed;
use Google\Ads\GoogleAds\V9\Services\KeywordSeed;
use Google\Ads\GoogleAds\V9\Services\UrlSeed;
use Google\ApiCore\ApiException;
use Auth;
use DB;

class KeywordPlanner extends Controller
{
   
    public function index() {
        $refreshToken = Auth::user()->google_refresh_token;
        return view('user.keywordPlanner',compact('refreshToken'));
    }

    public function publicPlanner(Request $request) {
        $refreshToken = DB::table('users')->where('id',1)->first()->google_refresh_token;
        $message = '';
        if($request->has('keyword') && isset($refreshToken)) {
            $url = $request->get('url') ?? null;
            if($request->has('action')) {
                $action = $request->get('action');
                echo $keyword = $this->getKeywordByAction($request->get('keyword'), $request->get('action'));
                die;
                $keywordResponse = $this->getGlobalKeywordAnalytics($refreshToken, $keyword, $url);
                return view('public.keywordPlanner', compact('keywordResponse'));
            }
        }
        return view('public.keywordPlanner');
    }

    public function getKeywordByAction($keyword = null, $action = null) {
        if(isset($keyword) && isset($action)) {
            switch($action) {
                case 'questions' :
                    $keyword = $this->getSearchesBasedOnClass($keyword, 'Lt3Tzc');
                    break;
                case 'similar_searches' :
                    $keyword = $this->getSearchesBasedOnClass($keyword, 'BNeawe s3v9rd AP7Wnd lRVwie');
                    break;
            }
        }
        return $keyword;
    }

    public function main(Request $request)
    {
        $refreshToken = Auth::user()->google_refresh_token;   
        if($request->has('keyword') && isset($refreshToken)) {
            $keywordResponse = $this->getGlobalKeywordAnalytics($refreshToken, $request->get('keyword'), $request->get('url'));
            return view('user.keywordPlanner', compact('keywordResponse','refreshToken'));
        }else {
            return redirect('keyword-planner')->with('status', 'Either Keyword is empty or connect to google ads'); 
        }
    }

    public function getGlobalKeywordAnalytics($refreshToken = null, $keyword = null, $url = null) {
        $response = array('status' => 'false', 'message' => 'Keyword Planner Not working at this moment please contact administator');  
        $message = '';
        if(isset($refreshToken) && isset($keyword)) {
            $oAuth2Credential = (new OAuth2TokenBuilder())->withClientId(env('CLIENT_ID'))->withClientSecret(env('CLIENT_SECRET'))->withRefreshToken($refreshToken)->build();
            $googleAdsClient = (new GoogleAdsClientBuilder())->withDeveloperToken(env('DEVELOPER_TOKEN'))->withOAuth2Credential($oAuth2Credential)->build();
            $keyword = explode(',',$keyword) ;
            try {
                $keywordResponse = $this->getKeywordsDetails($googleAdsClient,(int)env('CUSTOMER_ID'), [1012873],1000, $keyword , $url);
                $response = array('status' => 'true', 'data' => $keywordResponse, 'token' => $refreshToken);
            } catch (GoogleAdsException $googleAdsException) {
                foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
                    $message .= 'Error Code : '.$error->getErrorCode()->getErrorCode().', Message : '.$error->getMessage().'<br>';
                }
                $response = array('status' => 'false', 'message' => $message);
            } catch (ApiException $apiException) {
                $response = array('status' => 'false', 'message' => 'ApiException was thrown with message '.$apiException->getMessage());
            }
        }
        return $response;
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
            $cpc = is_null($result->getKeywordIdeaMetrics()) ? 0 : ($result->getKeywordIdeaMetrics()->getHighTopOfPageBidMicros() - $result->getKeywordIdeaMetrics()->getLowTopOfPageBidMicros()) / 2000000;
            $cpc = round($cpc,2);
            if($competition >= 67) {
                $competition = "HIGH";
            }elseif ($competition >= 33 && $competition < 33) {
                $competition = "Medium";
            }else {
                $competition = "LOW";
            }
            array_push($responseArray, ['keyword'=>$result->getText(), 'searches'=>$amc, 'competition'=>$competition, 'cpc' => $cpc]);
        }
       return $responseArray ?? [];
    }

/**
 * Function created to crawl the google result 
 * @param $keyword : contain the keyword to be crawled on google
 *        $class : contain the class to be searched on page
 *        Class for Related Searches : BNeawe s3v9rd AP7Wnd lRVwie
 *        class for Related Questions : Lt3Tzc
 */
    public function getSearchesBasedOnClass($keyword = null, $class = null) {
        if(isset($keyword) && isset($class)) {
            $response = $this->crawlGoogleResults($keyword);
            $relatedSearchesArray = $this->getInnerTextOfDiv($class, $response);
            if(!empty($relatedSearchesArray)) {
                $keywordString = implode(',', $relatedSearchesArray);
                return $keywordString ?? null;
            }
        }
        return null;
    }

}
