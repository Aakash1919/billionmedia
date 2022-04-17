<?php

namespace App\Http\Controllers\GoogleAds;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserProjectCompetitor as ModelsUserProjectCompetitor;
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

    public function view($id, Request $request) {
        $projectID = Crypt::decryptString($id);
        echo $projectID;
        return view('user.competitorTracking');
    }
}
