<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{

    public function index() {
        return view('public.home');
    }
    public function features() {
        return view('public.features');
    }
    public function solutions() {
        return view('public.solutions');
    }
    public function freeSeoTool() {
        return view('public.freeSeoTool');
    }
    public function pricing() {
        return view('public.pricing');
    } 
    public function blogs() {
        return view('public.blog');
    } 

    public function termsAndCondition() {
        return view('public.termsandConditions');
    }

    public function privacyPolicy() {
        return view('public.privacypolicy');
    }

    public function siteAudit() {
        return view('public.siteaudit');
    }

    public function keywrdRank() {
        return view('public.keywordRank');
    }

}
