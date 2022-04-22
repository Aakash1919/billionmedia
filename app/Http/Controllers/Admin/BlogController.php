<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blogs::all();
        return view('user.blog', compact('blogs'));
    }

    public function view($id=null) {
        $blog = Blogs::find($id);
        return view('user.createBlog', compact('blog'));
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:1000',
            'short_description' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {
            $errorMessages = '';
            foreach($validator->errors()->all() as  $error) {
                $errorMessages .= $error.'<br>';
            }
            return redirect()->back()->with('error', $errorMessages)->withInput();
            
        }else {
            $requestData = $request->except(['_token','blog_id']);

            if($request->has('image')) {
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('assets/images/blogs'), $imageName);
                $requestData['image'] = $imageName;    
            }
            
            $requestData['user_id'] = Auth::id();
            $requestData['short_description'] = htmlentities($request->short_description);
            $requestData['slug'] = Str::slug($request->title);
            $requestData['description'] = htmlentities($request->description);
            if($request->has('blog_id') && !empty($request->blog_id)) {
                
                Blogs::updateOrCreate(['id'=>$request->blog_id], $requestData);
            }else {
                Blogs::updateOrCreate($requestData);
            }
            return redirect()->back()->with('success', 'Blog Added/Updated Successfully');
        }
    }

}
