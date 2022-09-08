<?php

namespace App\Http\Controllers\GoogleAds;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserProjectCompetitor as ModelsUserProjectCompetitor;
use App\Models\UserProjects;
use App\Models\UserProjectKeyword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserProjectCompetitor extends Controller
{
    public function addCompetitor(Request $request) {
        if($request->has('projectID')) {
            $projectID = Crypt::decryptstring($request->projectID);
            $competitorID = $this->saveProjectIntoDb($request);

            $UserProjectCompetitor = new ModelsUserProjectCompetitor();
            $UserProjectCompetitor->project_id = $projectID;
            $UserProjectCompetitor->competitor_id = $competitorID;
            $UserProjectCompetitor->save();
            return redirect()->back()->with('status', 'Competitor Added Successfully');
            
        }else {
            return redirect()->back()->with('status', 'Project Not Found');
        }
    }

    public function view($id=null, Request $request) {
        if(isset($id)) {
            $projectID = Crypt::decryptString($id);
            $projectCompetitorRelation = ModelsUserProjectCompetitor::where('competitor_id',$projectID)->first();
            $projectCompetitor = UserProjects::find($projectCompetitorRelation->competitor_id);
            $project = UserProjects::find($projectCompetitorRelation->project_id);
            
            return view('user.competitorTracking', compact('project', 'projectCompetitor'));
        }
        
        return view('user.competitorTracking');
    }

    public function deletecompetitor($id){
        ModelsUserProjectCompetitor::where('id',$id)->delete();
        return redirect()->back()->with('status', 'Deleted');
    }

    public function deletekeyword($id){
        UserProjectKeyword::where('id',$id)->delete();
        return redirect()->back()->with('status', 'Deleted');
    }

    public function deleteProject($id) {
        $status = UserProjects::where('id',$id)->where('user_id',Auth::user()->id)->delete();
        if($status) {
            UserProjectKeyword::where('project_id',$id)->delete();
            ModelsUserProjectCompetitor::where('project_id',$id)->delete();    
        }
        return redirect()->back()->with('status', 'Deleted');
    }
}
