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

}
