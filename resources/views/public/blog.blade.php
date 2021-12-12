@extends('layouts.public')
@section('content')

<div class="banner-blog">
    <div class="container">
        <div class="row">
            <h2>Se Ranking Blog</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
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
                        <div class="col-md-6">
                            <div class="post-blog-box">
                                <img src="{{ asset('assets/front/images/930х690_mobile-optmization-450x334.png') }}">
                                <span>SEO Insights </span>
                                <div class="title"><a href="blog-details.html">The complete mobile optimization guide
                                        for SEO</a></div>
                                <div class="postyear">Nov 25, 2021</div>
                                <div class="posttime">11 min read</div>
                                <p>Since 2019 Google has been paying extra attention to mobile optimization and page
                                    usability when ranking websites. If your website is not mobile-friendly, you risk
                                    losing organic traffic. Learn more about the best mobile optimization practices and
                                    tools that can help improve the usability and SEO of your website.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-blog-box">
                                <img src="{{ asset('assets/front/images/blog1.png') }}">
                                <span>SEO Insights </span>
                                <div class="title"><a href="blog-details.html">20 pro tips on using SE Ranking</a></div>
                                <div class="postyear">Nov 22, 2021</div>
                                <div class="posttime">28 min read</div>
                                <p>There are a vast number of ways how SE Ranking can help take your SEO and marketing
                                    efforts to the next level, and we've decided to give you some useful tips. Here, we
                                    want to point out 20 pro ways of leveraging SE Ranking that you may have overlooked.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-blog-box">
                                <img src="{{ asset('assets/front/images/blog1') }}">
                                <span>SEO Insights </span>
                                <div class="title"><a href="blog-details.html">Best Black Friday & Cyber Monday Deals of
                                        2021 for Digital Marketers</a></div>
                                <div class="postyear">Nov 22, 2021</div>
                                <div class="posttime">35 min read</div>
                                <p>With Black Friday & Cyber Monday just around the corner, awesome deals and sales are
                                    already starting to pop up everywhere you look. To save you the hassle of going
                                    through all of them yourself, we want to give you a hand-picked list of the top
                                    marketing and SEO offers that you can use!</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-blog-box">
                                <img src="{{ asset('assets/front/images/blog1') }}">
                                <span>SEO Insights </span>
                                <div class="title">
                                    <<a href="blog-details.html">Historical data: The long-awaited Competitive Research
                                        and Keyword Research tool update</a>
                                </div>
                                <div class="postyear">Nov 17, 2021</div>
                                <div class="posttime">10 min read</div>
                                <p>Meet one of SE Ranking’s cool new features: historical data. From now on, you can
                                    access the Competitive Research tool to get organic and paid domain traffic data
                                    from previous periods going back to February 2020. On top of that, you can also go
                                    through a keyword’s historical data under the Keyword Research tool.</p>
                            </div>
                        </div>
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
                            <div class="side-post-bx">
                                <a href="#"><span>SEO Insights </span>Voice search and SEO</a>
                                <div class="year">Oct 30, 2021</div>
                                <div class="time">33 min read</div>
                            </div>
                            <div class="side-post-bx">
                                <a href="#"><span>SEO Insights </span>Building a safe backlink profile — Interview with
                                    ex-Googler Kaspar Szymanski</a>
                                <div class="year">Oct 30, 2021</div>
                                <div class="time">33 min read</div>
                            </div>
                            <div class="side-post-bx">
                                <a href="#"><span>SEO Insights </span>Why every website needs a favicon and how to get
                                    it right</a>
                                <div class="year">Oct 30, 2021</div>
                                <div class="time">33 min read</div>
                            </div>
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