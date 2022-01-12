<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
    public function sendCurlGet($endpoint=null, $queryParams = []) {
        if(isset($endpoint)) {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $endpoint, ['query' => $queryParams]);
            return ['status' => $response->getStatusCode(), 'content' => $response->getBody()];        
        }
        return ['status' => false, 'content' => ''];
    }

    public function getInnerTextOfDiv($className = '', $response = '') {
        if(preg_match_all('/<div class="'.$className.'">(.*?)<\/div>/s', $response, $match)) {
            return $match[0] ?? [];
        };
    }

    public function crawlGoogleResults($query = '', $page = 0, $url = 'http://www.google.co.in/search') {
        $queryParams = ['q' => $query, 'start'=>$page];
        $responseArray = $this->sendCurlGet($url, $queryParams);
        $response = isset($responseArray['content']) ? (string) $responseArray['content'] : '';
        return $response;
    }

}
