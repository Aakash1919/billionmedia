<?php

namespace App\Http\Controllers;

use App\Models\Blogs;

class PublicController extends Controller
{

    public function index() {
        $blogs = Blogs::paginate(3);
        return view('public.home', compact('blogs'));
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
        $blogs = Blogs::all();
        $topBlogs =  Blogs::paginate(3);
        return view('public.blog', compact('blogs', 'topBlogs'));
    } 

    public function viewBlog($slug=null) {
        $blogDetail = Blogs::where('slug', $slug)->first();
        return view('public.blogDetails', compact('blogDetail'));
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
