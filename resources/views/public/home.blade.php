@extends('layouts.public')
@section('content')

<div class="banner-saction">
    <div class="container">
        <div class="banner-saction-box">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner-saction-box-left">
                        <h2>Boost your <em>web</em><br> <em>traffic & rank</em> with<br> Billion Media</h2>
                        <p>Check the good and bad backlinks for you and the<br> competition.
                            A must have tool for SEOs, marketers, and <br>entrepreneurs!</p>
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="Add your first project">
                            <button type="submit" class="searchButton">Get Started</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-saction-box-right">
                        <img src="{{ asset('assets/front/images/content_thumb.png') }}" alt="seo">
                    </div>
                </div>
            </div>
            <ul class="logo-imge-bnnr">
                <span>AS FEATURED ON:</span>
                <li><a href="#"><img src="{{ asset('assets/front/images/logo-1.png') }}"></a></li>
                <li><a href="#"><img src="{{ asset('assets/front/images/logo-2.png') }}"></a></li>
                <li><a href="#"><img src="{{ asset('assets/front/images/logo-3.png') }}"></a></li>
                <li><a href="#"><img src="{{ asset('assets/front/images/logo-4.png') }}"></a></li>
            </ul>
        </div>
    </div>
</div>



<div class="about-saction">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about-saction-left">
                    <img src="{{ asset('assets/front/images/businessman-using-smartphone.jpg') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-saction-right">
                    <h3>About Us</h3>
                    <h2>Boosts Your Website Traffic!</h2>
                    <span>Adumn nec unum copiosae. Sea ex everti labores, ad option iuvaret qui muva.</span>
                    <p>Ea pro tibique comprehensam, sed ea verear numquam molestie. Nam te omittam comprehensam. Ne nam
                        nonumy putent fuisset, reque fabulas usu ne. Ex vel populo appellantur. Eos ne delenit admodum.
                    </p>
                    <a href="#">Learn More <img src="{{ asset('assets/front/images/right-arrow.png') }}"></a>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="saction-tow">
    <div class="container">
        <h2>Billion Media can boost<br> up your web traffic</h2>
        <p>We’ve got the tools you need to improve your website’s performance<br> and turn more browsers into buyers.
        </p>
        <div class="saction-tow-box">
            <div class="row">
                <div class="col-md-4">
                    <div class="saction-tow-box-inner">
                        <div class="icon-imge">
                            <img src="{{ asset('assets/front/images/icon-11.png') }}">
                        </div>
                        <div class="erwo-image"><img src="{{ asset('assets/front/images/icon-10.png') }}"></div>
                        <h3>Keyword Research</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="saction-tow-box-inner">
                        <div class="icon-imge">
                            <img src="{{ asset('assets/front/images/icon-9.png') }}">
                        </div>
                        <div class="erwo-image"><img src="{{ asset('assets/front/images/icon-10.png') }}"></div>
                        <h3>Content Explorer</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="saction-tow-box-inner">
                        <div class="icon-imge">
                            <img src="{{ asset('assets/front/images/icon-8.png') }}">
                        </div>
                        <div class="erwo-image"><img src="{{ asset('assets/front/images/icon-10.png') }}"></div>
                        <h3>On-Site & Data Explorer</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="saction-tow-box-inner">
                        <div class="icon-imge">
                            <img src="{{ asset('assets/front/images/icon-7.png') }}">
                        </div>
                        <div class="erwo-image"><img src="{{ asset('assets/front/images/icon-10.png') }}"></div>
                        <h3>Rank Tracker</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="saction-tow-box-inner">
                        <div class="icon-imge">
                            <img src="{{ asset('assets/front/images/icon-6.png') }}">
                        </div>
                        <div class="erwo-image"><img src="{{ asset('assets/front/images/icon-10.png') }}"></div>
                        <h3>On-Site & Data Explorer</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="saction-tow-box-inner">
                        <div class="icon-imge">
                            <img src="{{ asset('assets/front/images/icon-5.png') }}">
                        </div>
                        <div class="erwo-image"><img src="{{ asset('assets/front/images/icon-10.png') }}"></div>
                        <h3>On-Site & Data Explorer</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="saction-price">
    <div class="container">
        <h2>Simple, transparent pricing</h2>
        <p>No contracts. No surprise fees.</p>
        <div class="tab-saction">
            <ul class="tabs">
                <li class="tab-link current" data-tab="tab-1">MONTHLY</li>
                <li class="tab-link" data-tab="tab-2">YEARLY</li>
            </ul>
            <div id="tab-1" class="tab-content current">
                <div class="table-price">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="home-price-new">
                                <div class="tit-pric">Starter</div>
                                <div class="price-pric">$39<em>/mo</em></div>
                                <ul>
                                    <li>All limited links</li>
                                    <li>Own analytics platform</li>
                                    <li>Chat support</li>
                                    <li>Number of users <strong>1 user</strong></li>
                                    <li>Optimize hashtags</li>
                                    <li>Account manager</li>
                                    <li>Number of articles</li>
                                    <li>Satisfaction guaranteed</li>
                                </ul>
                                <a href="#">Choose plan</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="home-price-new home-price-pro">
                                <div class="tit-pric">Pro</div>
                                <div class="price-pric">$99<em>/mo</em></div>
                                <ul>
                                    <li>All limited links</li>
                                    <li>Own analytics platform</li>
                                    <li>Chat support</li>
                                    <li>Number of users <strong>3 users</strong></li>
                                    <li>Optimize hashtags</li>
                                    <li>Account manager</li>
                                    <li>Number of articles</li>
                                    <li>Satisfaction guaranteed</li>
                                </ul>
                                <a href="#">Choose plan</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="home-price-new">
                                <div class="tit-pric">Enterprise</div>
                                <div class="price-pric">$150<em>/mo</em></div>
                                <ul>
                                    <li>All limited links</li>
                                    <li>Own analytics platform</li>
                                    <li>Chat support</li>
                                    <li>Number of users <strong>Unlimited</strong></li>
                                    <li>Optimize hashtags</li>
                                    <li>Account manager</li>
                                    <li>Number of articles</li>
                                    <li>Satisfaction guaranteed</li>
                                </ul>
                                <a href="#">Choose plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-2" class="tab-content">
                <div class="table-price">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="home-price-new">
                                <div class="tit-pric">Starter</div>
                                <div class="price-pric">$60<em>/mo</em></div>
                                <ul>
                                    <li>All limited links</li>
                                    <li>Own analytics platform</li>
                                    <li>Chat support</li>
                                    <li>Number of users <strong>1 user</strong></li>
                                    <li>Optimize hashtags</li>
                                    <li>Account manager</li>
                                    <li>Number of articles</li>
                                    <li>Satisfaction guaranteed</li>
                                </ul>
                                <a href="#">Choose plan</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="home-price-new home-price-pro">
                                <div class="tit-pric">Pro</div>
                                <div class="price-pric">$150<em>/mo</em></div>
                                <ul>
                                    <li>All limited links</li>
                                    <li>Own analytics platform</li>
                                    <li>Chat support</li>
                                    <li>Number of users <strong>3 users</strong></li>
                                    <li>Optimize hashtags</li>
                                    <li>Account manager</li>
                                    <li>Number of articles</li>
                                    <li>Satisfaction guaranteed</li>
                                </ul>
                                <a href="#">Choose plan</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="home-price-new">
                                <div class="tit-pric">Enterprise</div>
                                <div class="price-pric">$200<em>/mo</em></div>
                                <ul>
                                    <li>All limited links</li>
                                    <li>Own analytics platform</li>
                                    <li>Chat support</li>
                                    <li>Number of users <strong>Unlimited</strong></li>
                                    <li>Optimize hashtags</li>
                                    <li>Account manager</li>
                                    <li>Number of articles</li>
                                    <li>Satisfaction guaranteed</li>
                                </ul>
                                <a href="#">Choose plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<section class="testimonial text-center">
    <div class="container">

        <div class="heading white-heading">
            Testimonial
        </div>
        <div id="testimonial4"
            class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x"
            data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="testimonial4_slide">
                        <img src="{{ asset('assets/front/images/Ellipse 4.png') }}" class="img-circle img-responsive" />
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
                    <div class="testimonial4_slide">
                        <img src="{{ asset('assets/front/images/Ellipse 4(1).png') }}" class="img-circle img-responsive" />
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
                    <div class="testimonial4_slide">
                        <img src="{{ asset('assets/front/images/Ellipse 4(2).png') }}" class="img-circle img-responsive" />
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
            <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</section>


<div class="post-saction-home">
    <div class="container">
        <h2>Read Our Lates News</h2>
        <p>Ad nec unum copiosae. Sea ex everti labores, ad option iuvaret qui. Id quo esse nusquam. Eam iriure diceret
            oporteat.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="post-saction-boxxx">
                    <img src="{{ asset('assets/front/images/930х690_mobile-optmization-450x334.png') }}">
                    <div class="year-date">Nov 25, 2021</div>
                    <h3><a href="#">The complete mobile optimization guide for SEO</a></h3>
                    <p>Since 2019 Google has been paying extra attention to mobile optimization and page..</p>
                    <a href="#" class="read-more">Read More <img src="{{ asset('assets/front/images/right-arrow.png') }}"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="post-saction-boxxx">
                    <img src="{{ asset('assets/front/images/930х690_20-Things-You-Can-Do-450x334.png') }}">
                    <div class="year-date">Nov 22, 2021</div>
                    <h3><a href="#">20 pro tips on using SE Ranking</a></h3>
                    <p>There are a vast number of ways how SE Ranking can help take your SEO and marketing..</p>
                    <a href="#" class="read-more">Read More <img src="{{ asset('assets/front/images/right-arrow.png') }}"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="post-saction-boxxx">
                    <img src="{{ asset('assets/front/images/1200х630-2-450x334.png') }}">
                    <div class="year-date">Nov 22, 2021</div>
                    <h3><a href="#">Best Black Friday & Cyber Monday Deals of 2021 for Digital Marketers</a></h3>
                    <p>With Black Friday & Cyber Monday just around the corner, awesome deals and sales are..</p>
                    <a href="#" class="read-more">Read More <img src="{{ asset('assets/front/images/right-arrow.png') }}"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {

        $('ul.tabs li').click(function () {
            var tab_id = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');

            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        })

    })
</script>
<script src="{{ asset('assets/front/js/slick-new.js') }}"></script>
<script>
    $(document).ready(function () {

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
        responsive: [
            {
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