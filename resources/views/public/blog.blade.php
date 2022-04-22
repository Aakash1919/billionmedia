@extends('layouts.public')
@section('content')

<div class="banner-blog">
    <div class="container">
        <div class="row">
            <h2>Seo Ranking Blog</h2>
            <ul>
                <li><a href="/">Home</a></li>
                <li>/</li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
</div>
<div class="saction-all-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="left-all-blog">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-md-6">
                                <div class="post-blog-box">
                                    <img src="{{ isset($blog->image) ? asset('assets/images/blogs/' . $blog->image) : '' }}">
                                    <span>SEO Insights </span>
                                    <div class="title"><a href="{{route('public.blogDetails')}}/{{$blog->slug ?? ''}}">{{$blog->title ?? ''}}</a></div>
                                    <div class="postyear">{{date('M d, Y', strtotime($blog->created_at))}}</div>
                                    <div class="posttime">11 min read</div>
                                    <p>{{$blog->short_description ?? ''}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="right-all-blog">
                    <div class="side-bar">
                        <div class="serch-bbt">
                            <form role="search" method="get" class="search-form" action=""> <label> <input type="search"
                                        class="search-field" placeholder="Search article" value="" name="s"> </label>
                                <button type="submit" class="search-submit" aria-label="search-submit"><span
                                        class="screen-reader-text">Search</span></button></form>
                        </div>
                        <div class="subs">
                            <div class="widget-title widgettitle">SUBSCRIBE TO OUR BLOG</div>
                            <div class="es_lablebox">
                                <div class="newsletter-form-area"> <label class="es_widget_form_email">Email *</label>
                                    <input type="text" placeholder="enter email address">
                                    <a href="#" class="btn btn_green es_textbox_button es_submit_button"
                                        data-lead-source="Blog Subscribers_en">Subscribe</a>
                                </div>
                            </div>
                        </div>
                        <div class="post-listt">
                            <h3>Our top posts</h3>
                            @foreach ($topBlogs as $blog)
                                <div class="side-post-bx">
                                    <a href="#"><span>SEO Insights </span>{{$blog->title ?? ''}}</a>
                                    <div class="year">{{date('M d, Y', strtotime($blog->created_at))}}</div>
                                    <div class="time">33 min read</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
@endpush
@endsection