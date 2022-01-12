<?php

namespace App\Http\Controllers\GoogleAds;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GoogleAds\KeywordPlanner;

class PositionTracking extends Controller
{
    protected $keywordPlannerObject;

    public function __construct() {
        $this->keywordPlannerObject = new KeywordPlanner();
    }

    public function getRank($param = 'fast.com') {
        $rankArray = [];
        for($i=0; $i<10; $i = $i+10) {
            $response = $this->keywordPlannerObject->crawlGoogleResults('google search api', $i);
            $position = strpos($response, $param);
            if(isset($position)) {
                array_push($rankArray, ['page'=>$i/10, 'position' => $position]);
            };
            $position = 0;
        }
        print_r($rankArray);
    }
} 

