<?php

namespace App\Http\Controllers\GoogleAds;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GoogleAds\KeywordPlanner;
use App\Models\UserProjectKeyword;
use App\Models\UserProjects;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class PositionTracking extends Controller
{
   
     public function saveProject(Request $request)
    {
        $projectID = $this->saveProjectIntoDb($request);
        if(isset($projectID)) {
            return redirect('rank-tracking')->with('status', 'Project Saved Successully');
        }
    }
    public function rankTracking($param=null, Request $requets) {
        if(!isset($param)) {
            $projectCount = UserProjects::where('user_id', Auth::id())->where('competitor',0)->count();
            if($projectCount > 0) {
                $projects = UserProjects::where('user_id', Auth::id())->where('competitor',0)->get();
                return view('user.projects', compact('projects'));
            }else {
                return view('user.createProject');
            }
        }else {
            try {
                $projectID = Crypt::decryptString($param);
                $project = UserProjects::where('id', $projectID)->first();
                return view('user.positionTracking', compact('project'));
            } catch (DecryptException $e) {
                return Redirect::back()->with('status', 'Decryption Failed'); 
            }
        }
    }

    public function addKeywords(Request $request) {
        $refreshToken = Auth::user()->google_refresh_token;
        if($request->has('projectID') && $request->has('keywords')) {
         $projectID = Crypt::decryptString($request->get('projectID'));
         $keywords = $request->get('keywords'); 
         $this->saveProjectKeywords($projectID, $keywords, $refreshToken);
         return Redirect::back()->with('status', 'Keywords Added Successfully'); 
        }
    }
    
} 

