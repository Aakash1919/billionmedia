<?php

namespace App\Http\Controllers\DataForSeo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DataForSeo\RestClient;


class ApiController extends Controller
{

    public function getKeywordResults(Request $request)
    {
        $message = '';
        if ($request->has('keyword')) {
            $url = $request->get('url') ?? null;
            if ($request->has('action')) {
                $action = $request->get('action');
                $keyword = $this->getKeywordByAction($request->get('keyword'), $request->get('action'));
                $keywordResponse = $this->getDataForSeoKeywordResponse($keyword, $url);
                return view('public.keywordPlanner', compact('keywordResponse', 'request'));
            }
        }
        return view('public.keywordPlanner');
    }

    public function getDataForSeoKeywordResponse($keyword, $url)
    {
        $post_array = array();
        $post_array[] = array(
            "location_code" => 2840,
            "keywords" => $keyword,
            "search_partners" => true
        );
        $client = $this->setClient();
        if ($client) {
            try {
                $result = $client->post('/v3/keywords_data/google_ads/search_volume/live', $post_array);
                if(isset($result['status_code']) && $result['status_code']==20000) {
                   return $result['tasks'][0]['result'] ?? [];
                }else {
                    return redirect('keyword-planner')->with('status', 'Either Keyword is empty or connect to google ads'); 
                }
            } catch (RestClientException $e) {
                return redirect('keyword-planner')->with('status', $e->getMessage()); 
            }
        }
    }

    public function setClient()
    {
        try {
            $client = new RestClient(env('API_DATAFORSEO_URL'), null, env('API_LOGIN'), env('API_PASSWORD'));
        } catch (RestClientException $e) {
            return redirect('keyword-planner')->with('status', $e->getMessage()); 
        }
        return $client;
    }

    public function getKeywordByAction($keyword = null, $action = null)
    {
        $keywordArray = array('count' => 100, 'keyword' => $keyword);
        if (isset($keyword) && isset($action)) {
            switch ($action) {
                case 'questions':
                    $keywordArray = $this->getSearchesBasedOnClass($keyword, 'Lt3Tzc');
                    break;
                case 'similar_searches':
                    $keywordArray = $this->getSearchesBasedOnClass($keyword, 'BNeawe s3v9rd AP7Wnd lRVwie');
                    break;
                case 'autocomplete':
                    $keywordArray = $this->getAutoCompleteSearchResults($keyword);
                    break;
                default:
                    $keywordArray = explode(',', $keyword);
                    break;
            }
        }
        return $keywordArray;
    }

    /**
     * Function created to crawl the google result 
     * @param $keyword : contain the keyword to be crawled on google
     *        $class : contain the class to be searched on page
     *        Class for Related Searches : BNeawe s3v9rd AP7Wnd lRVwie
     *        class for Related Questions : Lt3Tzc
     */
    public function getSearchesBasedOnClass($keyword = null, $class = null, $start = 0)
    {
        if (isset($keyword) && isset($class)) {
            $queryParams = ['q' => $keyword, 'start' => $start];
            $response = $this->crawlGoogleResults($queryParams);
            $relatedSearchesArray = $this->getInnerTextOfDiv($class, $response);
            if (!empty($relatedSearchesArray)) {
                return $relatedSearchesArray;
            }
        }
        return [];
    }
    /**
     * Google Autocomplete Functionality
     * @url : http://suggestqueries.google.com/complete/search?client=chrome&q=test
     * 
     * @param $keyword : Keyword on the bases of whom we have to calculate the results
     */

    public function getAutoCompleteSearchResults($keyword = null, $url = 'https://suggestqueries.google.com/complete/search')
    {
        if (isset($keyword)) {
            $queryParams = ['client' => 'chrome', 'q' => $keyword];
            $jsonResponse = $this->crawlGoogleResults($queryParams, $url);
            $response = json_decode($jsonResponse);
            if (isset($response[1]) && is_array($response[1])) {
                return  $response[1];
            }
            return [];
        }
    }
}
