<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/images/seo-science.svg')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">SEO Science</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('home') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route('keyword-planner') }}">
                <div class="parent-icon"><i class='lni lni-keyword-research'></i>
                </div>
                <div class="menu-title">Keyword Planner</div>
            </a>
        </li>
        <li>
            <a href="{{ route('rank-tracking-id') }}">
                <div class="parent-icon"><i class='fadeIn animated bx bx-repost'></i>
                </div>
                <div class="menu-title">Position Tracking</div>
            </a>
        </li> 
        @if(Auth::user()->usertype==1)
        <li>
            <a href="{{ route('user.blog') }}">
                <div class="parent-icon"><img src="{{ asset('assets/images/drawing.png') }}">
                </div>
                <div class="menu-title">Blog</div>
            </a>
        </li>   
        @endif    
    </ul>
    <!--end navigation-->
</div>