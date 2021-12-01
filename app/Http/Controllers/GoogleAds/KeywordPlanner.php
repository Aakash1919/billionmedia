<?php

namespace App\Http\Controllers\GoogleAds;

use App\Http\Controllers\GoogleAds\GoogleAuthenticate;
use Auth;
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

class KeywordPlanner extends BaseController
{
    protected $googleAuthenticateObject;
    protected $refreshToken;

    public function __construct() {
        $this->googleAuthenticateObject = new GoogleAuthenticate();
        $this->refreshToken = Auth::user()->google_refresh_token();
    }

    public function main()
    {
       
        $oAuth2Credential = (new OAuth2TokenBuilder())->withClientId(env('CLIENT_ID'))->withClientSecret(env('CLIENT_SECRET'))->withRefreshToken($this->refreshToken)->build();
        $googleAdsClient = (new GoogleAdsClientBuilder())->withDeveloperToken(env('DEVELOPER_TOKEN'))->withOAuth2Credential($oAuth2Credential)->build();

        try {
            $this->getKeywordsDetails($googleAdsClient,env('CUSTOMER_ID'), [1007740],1000,['test'], null);
        } catch (GoogleAdsException $googleAdsException) {
            printf(
                "Request with ID '%s' has failed.%sGoogle Ads failure details:%s",
                $googleAdsException->getRequestId(),
                PHP_EOL,
                PHP_EOL
            );
            foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
                /** @var GoogleAdsError $error */
                printf(
                    "\t%s: %s%s",
                    $error->getErrorCode()->getErrorCode(),
                    $error->getMessage(),
                    PHP_EOL
                );
            }
            exit(1);
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
            exit(1);
        }
    }

    public function getKeywordsDetails(GoogleAdsClient $googleAdsClient, int $customerId, array $locationIds, int $languageId, array $keywords,?string $pageUrl
    ) {
        $keywordPlanIdeaServiceClient = $googleAdsClient->getKeywordPlanIdeaServiceClient();
        if (empty($keywords) && is_null($pageUrl)) {
            throw new \InvalidArgumentException(
                'At least one of keywords or page URL is required, but neither was specified.'
            );
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
            printf(
                "Keyword idea text '%s' has %d average monthly searches and competition as %d.%s",
                $result->getText(),
                is_null($result->getKeywordIdeaMetrics()) ?
                    0 : $result->getKeywordIdeaMetrics()->getAvgMonthlySearches(),
                is_null($result->getKeywordIdeaMetrics()) ?
                    0 : $result->getKeywordIdeaMetrics()->getCompetition(),
                PHP_EOL
            );
        }
    }
}
