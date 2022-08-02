@extends('layouts.public')
@section('content')
    <div class="banner-saction">
        <div class="container">
            <div class="banner-saction-box">
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner-saction-box-left">
                            <h2>SEO Science can help to launch your traffic to the next level</h2>
                            <p>Carry out keyword research, track your rankings and keep tabs on your competitors. Try it for
                                free today</p>
                            <div class="search">
                                <input type="text" class="searchTerm" placeholder="Add your first project">
                                <a href="{{route('login')}}"><button type="submit" class="searchButton"> Get Started</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner-saction-box-right"> <img
                                src="{{ asset('assets/front/images/content_thumb.png') }}" alt="seo"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-saction">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-saction-left"> <img src="{{ asset('assets/images/image01-1.png') }}"> </div>
                </div>
                <div class="col-md-6">
                    <div class="about-saction-right">
                        <h3>About Us</h3>
                        <h2>What Is SEO Science? </h2>
                        <span>SEO Science is a complete search engine optimisation tool.</span>
                        <p>It helps both individuals and companies assess, improve and develop their website’s SEO
                            performance, using cutting edge technology and professional insights gleaned through years
                            working in the industry.</p>
                        <p>You can conduct keyword research using our unique crawlers, track the performance of keywords,
                            and conduct site audits of your site to identify areas of improvement to help give you the edge
                            over your competitors.</p>
                        <p>SEO Science is free to use, with a paid package that gives you full and complete access to all
                            services.</p>
                        <p>You can also browse our site for lots of helpful guides on improving your website’s performance.
                            And you can check out our YouTube channel which has lots of quick videos packed with useful
                            tips.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="saction-tow">
        <div class="container">
            <h2>How Can SEO <br>
                Science Help Me?</h2>
            <p>SEO Science is designed to help you improve your online presence in a number of ways. We help you do this
                through our various tools and services, which we’ll discuss below.</p>
            <div class="new-boxhome">
                <div class="row">
                    <div class="col-md-6">
                        <div class="new-boxhome-inner">
                            <h3>SEO Keyword Research </h3>
                            <span>Our SEO keyword research tool is one of the core services that we offer. If you’re
                                unfamiliar with such a tool, it’s simply a means of finding out crucial information about
                                search terms that you’d like to target for your own website. </span> <em>The SEO Science
                                keyword tool provides data on:</em>
                            <ul>
                                <li>Your desired keyword and variations of that term that could be used in your written
                                    content</li>
                                <li>Any search terms that are related to your focus keyword</li>
                                <li>Questions relating to that keyword which other people have used search engines to find
                                    the answer for</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="new-boxhome-inner"> <img
                                src="{{ asset('assets/images/new-home-14-banner-img.png') }}"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="saction-neww">
        <div class="container"> <span>When you <em>conduct your search,</em> you’ll be provided with other pieces of
                data too, such as the monthly search volume of each <em>keyword</em> and whether it has any <em>cost per
                    click value,</em> which can be very useful if you’re planning to use <em>paid advertisements</em> such
                as on Google. </span>
            <div class="row">
                <div class="col-md-6">
                    <div class="saction-neww-inner"> <img src="{{ asset('assets/images/image09.png') }}"> </div>
                </div>
                <div class="col-md-6">
                    <div class="saction-neww-inner">
                        <h2>Rank Tracking </h2>
                        <p>As well as conducting keyword research and putting together content designed to help you rank for
                            those search terms, it’s also important to track the performance of your efforts. Without doing
                            so, you could be left in the dark as to whether or not all your hard work has paid off.</p>
                        <p>That’s why SEO Science has a rank tracking function. It provides you with daily updates on how
                            your keywords are performing. </p>
                        <p>This is very useful in working out whether your content has done the job in getting indexed and
                            ranked, and whether any updates you make to that page have had either a positive or negative
                            impact on its search engine performance. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="saction-neww-inner">
                        <h2>Site Audits</h2>
                        <p>We feel one of the most important actions you can carry out on a regular basis is to carry out a
                            site audit of your site.</p>
                        <p>Over time, errors can develop on your website, such as unminified CSS and Javascript files, which
                            can slow down and hamper the performance of your website. </p>
                        <p>With our site audit, you can identify these types of issues, as well as problems to do with the
                            images used, linking structure, broken internal and external links, and issues to do with anchor
                            text. </p>
                        <p>Our site audit service also provides guidance on the steps that you can take to fix these
                            problems quickly to get your site back on track.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="saction-neww-inner"> <img src="{{ asset('assets/images/image08.png') }}"> </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <section class="testimonial text-center">
  <div class="container">
    <div class="heading white-heading"> Testimonial </div>
    <div id="testimonial4"
            class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x"
            data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="testimonial4_slide"> <img src="{{ asset('assets/front/images/Ellipse 4.png') }}" class="img-circle img-responsive" />
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
              voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
              cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id
              est laborum et dolorum fuga.</p>
            <h4>John Doe</h4>
            <span>SEO</span>
            <div class="profile-rating"><img src="{{ asset('assets/front/images/Star 2.png') }}"><img src="{{ asset('assets/front/images/Star 2.png') }}"><img
                                src="{{ asset('assets/front/images/Star 2.png') }}"><img src="{{ asset('assets/front/images/Star 2.png') }}"><img src="{{ asset('assets/front/images/Star 5.png') }}"></div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="testimonial4_slide"> <img src="{{ asset('assets/front/images/Ellipse 4(1).png') }}" class="img-circle img-responsive" />
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
              voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
              cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id
              est laborum et dolorum fuga.</p>
            <h4>Emma</h4>
            <span>SEO</span>
            <div class="profile-rating"><img src="{{ asset('assets/front/images/Star 2.png') }}"><img src="{{ asset('assets/front/images/Star 2.png') }}"><img
                                src="{{ asset('assets/front/images/Star 2.png') }}"><img src="{{ asset('assets/front/images/Star 2.png') }}"><img src="{{ asset('assets/front/images/Star 5.png') }}"></div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="testimonial4_slide"> <img src="{{ asset('assets/front/images/Ellipse 4(2).png') }}" class="img-circle img-responsive" />
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
              voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
              cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id
              est laborum et dolorum fuga.</p>
            <h4>Noah</h4>
            <span>SEO</span>
            <div class="profile-rating"><img src="{{ asset('assets/front/images/Star 2.png') }}"><img src="{{ asset('assets/front/images/Star 2.png') }}"><img
                                src="{{ asset('assets/front/images/Star 2.png') }}"><img src="{{ asset('assets/front/images/Star 2.png') }}"><img src="{{ asset('assets/front/images/Star 5.png') }}"></div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#testimonial4" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#testimonial4" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> </div>
  </div>
</section> --}}
    <div class="signup-saction">
        <div class="container">
            <h3>Sign Up For SEO Science Today For Free</h3>
            <p>You can sign up for the SEO Science free package today. As part of this free package you can carry out
                keyword research, track a number of keywords and carry out site audits of your website. </p>
            <p>You can also subscribe to our paid package which gives you full and unlimited access to all of our services.
            </p>
            <ul>
                <li><a href="{{ route('register') }}" class="sign">Sign up</a></li>
                <li><a href="{{ route('public.contactUs') }}" class="cont">Contact us</a></li>
            </ul>
        </div>
    </div>
    <div class="post-saction-home">
        <div class="container">
            <h2>Read Our Latest News</h2>
            <p>Our Latest Blogs</p>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-4">
                        <div class="post-saction-boxxx"> <img
                                src="{{ isset($blog->image) ? asset('assets/images/blogs/' . $blog->image) : '' }}">
                            <div class="year-date">{{ date('M d, Y', strtotime($blog->created_at)) }}</div>
                            <h3><a
                                    href="{{ route('public.blogDetails') }}/{{ $blog->slug ?? '' }}">{{ $blog->title ?? '' }}</a>
                            </h3>
                            <p>{{ $blog->short_description ?? '' }}</p>
                            <a href="#" class="read-more">Read More <img
                                    src="{{ asset('assets/front/images/right-arrow.png') }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/front/js/slick-new.js') }}"></script>
        <script>
            $(document).ready(function() {

                $('.items-tow').slick({
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 1
                });
            });
        </script>
        <script>
            $('.items-tow').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        </script>
    @endpush
@endsection
