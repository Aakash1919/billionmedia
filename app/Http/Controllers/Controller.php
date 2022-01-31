<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Countries;
use App\Models\Languages;
use Illuminate\Http\Request;
use DB;

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
            if(isset($match[0]) && is_array($match[0])) {
                foreach ($match[0] as $key => $value) {
                    $returnArray[$key] = trim(strip_tags($value));
                }
            }
            return $returnArray ?? [];

        };
    }

    public function crawlGoogleResults($queryParams = [], $url = 'https://www.google.co.in/search') {
        if(!empty($queryParams)) {
            $responseArray = $this->sendCurlGet($url, $queryParams);
            $response = isset($responseArray['content']) ? (string) $responseArray['content'] : '';
            return $response;
        }
        return false;
        
    }

    public function getCountries(Request $request) {
        $jsonArray = array();
        if($request->has('term')) {
            $countries = Countries::where('name', 'like', '%' . $request->get('term') . '%')->get();
            foreach($countries as $country) {
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
    public function getLanguages() {
        return Languages::all();
    }
}
