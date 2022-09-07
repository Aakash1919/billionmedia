@extends('layouts.public')
@section('content')


<div class="page-banner-area item-bg3">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>About SEO Science</h2>
                    <ul><li><a href="/">Home</a></li><li class="active">About SEO Science</li></ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-image-warp">
                    <img src="{{ asset('assets/images/about-2.jpg') }}">
                </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content warp">
                        <span>About Us</span>
                        <h3>SEO Science was created to help individuals and businesses take their organic traffic to the next level.</h3>
                        <div class="bar"></div>
                        <p>With our years of experience in the Search Engine Optimisation (SEO) industry, we wanted to create a tool that’s easy to use and provides simple yet effective suggestions to help you improve the performance of your website. </p>
                        <p>Our services allow users to conduct thorough keyword research to help them rank for even more keywords. </p>
                        <p>With our help and guidance on how to use those keywords, combined with the ability to track their performance in search engines, you’re almost guaranteed to see positive results within a short space of time.</p>
                        <p>And to help you further, our site audit feature allows you to analyse your website to detect any issues which could be holding back growth, such as detecting broken links and any duplicate pages.</p>
                        <p>It’s our passion to help other people grow their websites and businesses. That’s why you can try all of our features for free so you can get to work right away.</p>
                        <p>And if you need more help beyond what you find on our site, get in touch with our team of SEO Scientists. They can answer any queries you have.</p>
                        <p>If you have any questions about SEO Science or would like to learn about the likes of our pricing, please get in touch via our <a href="{{ route('public.contactUs')}}">contact page.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
</div>

@endsection 