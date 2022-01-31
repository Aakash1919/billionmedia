<?php

namespace App\Http\Controllers\GoogleAds;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GoogleAds\KeywordPlanner;
use App\Models\UserProjectKeyword;
use App\Models\UserProjects;
use Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PositionTracking extends Controller
{
    protected $keywordPlannerObject;

    public function __construct() {
        $this->keywordPlannerObject = new KeywordPlanner();
    }

    public function positionTracking() {
        $projectCount = UserProjects::where('user_id', Auth::id())->count();
        if($projectCount > 0) {
            $projects = UserProjects::where('user_id', Auth::id())->get();
            return view('user.projects', compact('projects'));
        }else {
            return view('user.createProject');
        }
    }

    public function rankTracking($param) {
        try {
            $projectID = Crypt::decryptString($param);
            $keywordDetail = UserProjectKeyword::where('project_id', $projectID)->select('keyword','previous_stats', 'current_stats')->get();
            return view('user.positionTracking', compact('projectID','keywordDetail'));
        } catch (DecryptException $e) {
            //
        }
    }

    public function saveProject(Request $request) {
        $this->validate($request,[
            'website_name'=>'required',
            'website_url'=>'required|active_url',
            'country'=>'required',
            'keywords'=>'required'
         ]);
         $UserProjects = new UserProjects;
         $UserProjects->user_id	= Auth::id();
         $UserProjects->website_name = $request->get('website_name');	
         $UserProjects->website_url	=$request->get('website_url');
         $UserProjects->location = $request->get('country');
         $UserProjects->status = 1;

         $UserProjects->save();
         $projectID = $UserProjects->id; 
         if(isset($projectID)) {
             $keywords = $request->get('keywords');
             $keywordsArray = explode(',', $keywords);
             foreach($keywordsArray as $keyword) {
                $UserProjectKeyword = new UserProjectKeyword();
                $UserProjectKeyword->project_id = $projectID;
                $UserProjectKeyword->keyword = $keyword;
                $UserProjectKeyword->save();
             }
         }
         return redirect('rank-tracking')->with('status', 'Project Saved Successully'); 
        
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

