<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GoogleAds\KeywordPlanner;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Countries;
use App\Models\Languages;
use App\Models\UserProjectKeyword;
use App\Models\UserProjects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendCurlGet($endpoint = null, $queryParams = [])
    {
        if (isset($endpoint)) {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $endpoint, ['query' => $queryParams]);
            return ['status' => $response->getStatusCode(), 'content' => $response->getBody()];
        }
        return ['status' => false, 'content' => ''];
    }

    public function getInnerTextOfDiv($className = '', $response = '')
    {
        if (preg_match_all('/<div class="' . $className . '">(.*?)<\/div>/s', $response, $match)) {
            if (isset($match[0]) && is_array($match[0])) {
                foreach ($match[0] as $key => $value) {
                    $returnArray[$key] = trim(strip_tags($value));
                }
            }
            return $returnArray ?? [];
        };
    }

    public function crawlGoogleResults($queryParams = [], $url = 'https://www.google.co.in/search')
    {
        if (!empty($queryParams)) {
            $responseArray = $this->sendCurlGet($url, $queryParams);
            $response = isset($responseArray['content']) ? (string) $responseArray['content'] : '';
            return $response;
        }
        return false;
    }

    public function getCountries(Request $request)
    {
        $jsonArray = array();
        if ($request->has('term')) {
            $countries = Countries::where('name', 'like', '%' . $request->get('term') . '%')->get();
            foreach ($countries as $country) {
                $singleCountry = array(
                    'id' => $country->id,
                    'label' => $country->name,
                    'value' => $country->name
                );
                array_push($jsonArray, $singleCountry);
            }
            return response()->json($jsonArray);
        }
    }
    public function getLanguages()
    {
        return Languages::all();
    }

    public function saveProjectIntoDb(Request $request)
    {
        $refreshToken = Auth::user()->google_refresh_token;

        $this->validate($request, [
            'website_name' => 'required',
            'website_url' => 'required|active_url',
            'country' => 'required',
            'keywords' => 'required'
        ]);
        $UserProjects = new UserProjects();
        $UserProjects->user_id    = Auth::id();
        $UserProjects->website_name = $request->get('website_name');
        $UserProjects->website_url    = $request->get('website_url');
        $UserProjects->location = $request->get('country');
        $UserProjects->competitor = $request->get('competitor') ?? 0;
        $UserProjects->status = 1;

        $UserProjects->save();
        $projectID = $UserProjects->id;
        $keywords = $request->get('keywords');
        $this->saveProjectKeywords($projectID, $keywords, $refreshToken);
        return $projectID ?? null;
    }

    public function saveProjectKeywords($projectID = null, $keywords = null, $refreshToken = null)
    {
        $keywordPlannerObject = new KeywordPlanner();
        if (isset($projectID) && isset($keywords)) {
            $websiteUrl = UserProjects::where('id', $projectID)->value('website_url');
            $websiteUrl = str_replace(['http://', 'https://'], "", $websiteUrl);
            $keywordsArray = explode(',', $keywords);
            foreach ($keywordsArray as $keyword) {
                $keywordStat = $keywordPlannerObject->getGlobalKeywordAnalytics($refreshToken, ['keyword' => $keyword, 'count' => 1]);
                $rankStats = $this->getRank($websiteUrl, $keyword);
                $UserProjectKeyword = new UserProjectKeyword();
                $UserProjectKeyword->project_id = $projectID;
                $UserProjectKeyword->stats = json_encode($keywordStat);
                $UserProjectKeyword->previous_position = $UserProjectKeyword->current_position;
                $UserProjectKeyword->current_position = isset($rankStats[0]['position']) ? $rankStats[0]['position'] : '100+';
                $UserProjectKeyword->keyword = $keyword;
                $UserProjectKeyword->save();
            }
        }
    }
    public function getRank($url = null, $keyword = null)
    {
        $keywordPlannerObject = new KeywordPlanner();

        $rankArray = [];
        if (isset($url) && $keyword) {
            $i = 1;
            for ($page = 0; $page < 60; $page = $page + 10) {
                $response = $keywordPlannerObject->getSearchesBasedOnClass($keyword, env('SEARCH_ENGINE_LINKS_CLASS'), $page);
                if (isset($response['keyword'])) {
                    $keywords = explode(',', $response['keyword']);
                    if (!empty($keywords)) {
                        foreach ($keywords as  $keys => $value) {
                            if (strpos($value, $url)) {
                                $position = $i * ($keys + 1);
                                array_push($rankArray, ['page' => 0, 'position' => $position]);
                            }
                        }
                    }
                }
                $i++;
            }
        }
        return $rankArray;
    }
}
