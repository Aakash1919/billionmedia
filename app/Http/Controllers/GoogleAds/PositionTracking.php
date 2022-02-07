<?php

namespace App\Http\Controllers\GoogleAds;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GoogleAds\KeywordPlanner;
use App\Models\UserProjectKeyword;
use App\Models\UserProjects;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Auth;

class PositionTracking extends Controller
{
    protected $keywordPlannerObject;
    protected $refreshToken; 

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->refreshToken = Auth::user()->google_refresh_token;
            if(!isset($this->refreshToken)) {
                return Redirect::to('google-authorize');
            }else {
                return $next($request);
            }
        });
        
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
            $keywordDetail = UserProjectKeyword::where('project_id', $projectID)->select('keyword','previous_position', 'current_position', 'stats')->get();
            return view('user.positionTracking', compact('projectID','keywordDetail'));
        } catch (DecryptException $e) {
            return Redirect::back()->with('status', 'Decryption Failed'); 
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
         $keywords = $request->get('keywords');
         $this->saveProjectKeywords($projectID, $keywords, $this->refreshToken);
         return redirect('rank-tracking')->with('status', 'Project Saved Successully'); 
        
    }

    public function addKeywords(Request $request) {
        if($request->has('projectID') && $request->has('keywords')) {
         $projectID = Crypt::decryptString($request->get('projectID'));
         $keywords = $request->get('keywords'); 
         $this->saveProjectKeywords($projectID, $keywords, $this->refreshToken);
         return Redirect::back()->with('status', 'Keywords Added Successfully'); 
        }
    }

    public function saveProjectKeywords($projectID = null, $keywords = null, $refreshToken=null) {
        if(isset($projectID) && isset($keywords)) {
            $websiteUrl = UserProjects::find($projectID)->value('website_url');
            $websiteUrl = str_replace(['http://','https://'],"",$websiteUrl);
            $keywordsArray = explode(',', $keywords);
            foreach($keywordsArray as $keyword) {
               $keywordStat = $this->keywordPlannerObject->getGlobalKeywordAnalytics($refreshToken, ['keyword'=>$keyword, 'count'=>1]);
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

    public function getRank($url = null, $keyword = null) {
        $rankArray = [];
        if(isset($url) && $keyword) {
            for($page=0; $page<60; $page = $page+10) {
                $response = $this->keywordPlannerObject->getSearchesBasedOnClass($keyword, 'BNeawe UPmit AP7Wnd', $page);
                if(isset($response['keyword'])) {
                    $keywords = explode(',', $response['keyword']);
                    foreach($keywords as  $keys => $value) {
                        if(str_contains($value, $url)) {
                            $position = ($page+1) * ($keys+1);
                            array_push($rankArray, ['page'=>0, 'position' => ++$position]);
                        }
                    }
                }
            }
            
        }
        return $rankArray;
    }
   
} 

