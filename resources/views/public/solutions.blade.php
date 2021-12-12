@extends('layouts.public')
@section('content')

<div class="saction-solutions-one">
    <div class="container">
        <span>WHAT'S YOUR SEO SCORE</span>
        <h2>Your Business Find <br> Better Solutions</h2>
        <p>Over the years, we have worked with Fortune 500s and brand-new startups.</p>
        <div class="icon-saluction"><img src="{{ asset('assets/front/images/topimg-home1.png') }}"></div>
    </div>
</div>
<div class="saction-solutions-tow">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="solutions-tow-box">
                    <span><img src="{{ asset('assets/front/images/solu-1.png') }}"></span>
                    <h3>Awesome Results</h3>
                    <p>We have seen great successes with everyone companies.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="solutions-tow-box tow-box-tow">
                    <span><img src="{{ asset('assets/front/images/solu-4.png') }}"></span>
                    <h3>All Sizes Business</h3>
                    <p>Every business and industry requires an approach.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="solutions-tow-box">
                    <span><img src="{{ asset('assets/front/images/solu-3.png') }}"></span>
                    <h3>Keep you in the Loop</h3>
                    <p>You make sure you know how campaign is performing.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="solutions-tow-box tow-box-tow">
                    <span><img src="{{ asset('assets/front/images/solu-2.png') }}"></span>
                    <h3>Significant ROI</h3>
                    <p>To generate highly focused leads ready to purchases. </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="saction-solutions-three">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="solutions-three-box">
                    <img src="{{ asset('assets/front/images/image3-h8.png') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="solutions-three-box">
                    <span>About Us</span>
                    <h2>Grow Your Business
                        with Our SEO Agency</h2>
                    <em>Over 10 years Onum helping companies reach their financial and branding goals.</em>
                    <p>Over the years, we have worked with Fortune 500s and brand-new startups. We help ambitious
                        businesses like yours generate more profits by building awareness, driving web traffic,
                        connecting with customers, and growing overall sales. Give us a call. </p>
                    <a href="#">Learn More <img src="{{ asset('assets/front/images/right-arrow.png') }}"></a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="saction-solutions-four">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="solutions-four-box">
                    <span>why choose us</span>
                    <h2>Work with a Dedicated SEO Company</h2>
                    <div id="main">
                        <div class="accordion" id="faq">
                            <div class="card">
                                <div class="card-header" id="faqhead1">
                                    <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                                        aria-expanded="true" aria-controls="faq1">Keyword & Market Research</a>
                                    <img src="{{ asset('assets/front/images/down-arrow.png') }}">
                                </div>
                                <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                    <div class="card-body">
                                        <p>Onum always works to stay on top of the latest trends and best practices to
                                            apply to your company projects. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqhead2">
                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                        data-target="#faq2" aria-expanded="true" aria-controls="faq2">Graphics &
                                        Interactive Content </a>
                                    <img src="{{ asset('assets/front/images/down-arrow.png') }}">
                                </div>
                                <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                                    <div class="card-body">
                                        <p>We help ambitious businesses like yours generate more profits by building
                                            awareness, driving web traffic, connecting with customers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqhead3">
                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                        data-target="#faq3" aria-expanded="true" aria-controls="faq3">Social Media
                                        Promotion </a>
                                    <img src="{{ asset('assets/front/images/down-arrow.png') }}">
                                </div>
                                <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                    <div class="card-body">
                                        <p>Google has said for years that the most important single factor to them is
                                            high quality content. Now more than ever, they have the ability.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqhead4">
                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                        data-target="#faq4" aria-expanded="true" aria-controls="faq3">Digital PR &
                                        Penalty Recovery </a>
                                    <img src="{{ asset('assets/front/images/down-arrow.png') }}">
                                </div>
                                <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
                                    <div class="card-body">
                                        <p>We help ambitious businesses like yours generate more profits by building
                                            awareness, driving web traffic, connecting with customers.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="solutions-four-box">
                    <img src="{{ asset('assets/front/images/image1-home4.png') }}">
                </div>
            </div>

        </div>
    </div>
</div>
@push('scripts')
@endpush
@endsection