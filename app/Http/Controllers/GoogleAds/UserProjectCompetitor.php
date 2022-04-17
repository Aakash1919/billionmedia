<?php

namespace App\Http\Controllers\GoogleAds;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProjectCompetitor extends Controller
{
    public function addCompetitor(Request $request) {
        print_r($request->all());
    }
}
