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

    public function positionTracking() {
        return view('user.positionTracking');
    }

    public function createProject() {
        return view('user.createProject');
    }

    public function getRank($param = 'fast.com') {
        $rankArray = [];
        for($page=0; $page<10; $page = $page+10) {
            $queryParams = ['q' => 'google search api', 'start'=>$page];
            $response = $this->keywordPlannerObject->crawlGoogleResults($queryParams);
            $position = strpos($response, $param);
            if(isset($position)) {
                array_push($rankArray, ['page'=>$page/10, 'position' => $position]);
            };
            $position = 0;
        }
        print_r($rankArray);
    }
} 

