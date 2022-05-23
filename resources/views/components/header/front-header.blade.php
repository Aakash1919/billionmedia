<div class="hadder-saction" id="myHeader">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo-box">
                    <a href="/"><img src="{{ asset('assets/images/seo-science-logo.png') }}" alt="LOGO"></a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="logo-box">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item feat-nav active"><a class="nav-link" href="{{ route('public.features')}}">Features</a></li>
                                <li class="nav-item solu-nav"><a class="nav-link" href="{{ route('public.solutions')}}">Solutions</a></li>
                                <li class="nav-item free-nav"><a class="nav-link" href="{{ route('public.freeSeoTool')}}">Free SEO Tools</a></li>
                                <li class="nav-item plan-nav"><a class="nav-link" href="{{ route('public.pricing')}}">Plans & Pricing</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('public.keyword-planner') }}">keywordResearch</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('public.keywordRank') }}">keywordRank</a></li>
                                
                                <li class="nav-item"><a class="nav-link" href="{{ route('public.siteaudit') }}">SiteAudit</a></li>
                               
                                <li class="nav-item"><a class="nav-link" href="{{ route('public.blogs') }}">Blogs</a></li>
                                
                                <li class="start-fre"><a href="{{route('login')}}">Start Free Trial</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>