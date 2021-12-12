@extends('layouts.public')
@section('content')

<div class="banner-plan-prcing">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="boxplan-prcing">
                    <h2>Plans and Pricing </h2>
                    <p>Our plans for all types of businesses and needs</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-plan-prcing">
    <div class="container">
        <div class="page-plan-prcing-all">
            <div class="row">
                <div class="col-md-4">
                    <div class="page-plan-box">
                        <span>essential</span>
                        <div class="price">$31<em>/month</em></div>
                        <div class="buy-now"><a href="#">Buy Now</a></div>
                        <div class="rank-rating">
                            <p>Rank Tracking:</p>
                            <select>
                                <option class="id">250 Keyboard</option>
                                <option class="id">250 Keyboard</option>
                                <option class="id">250 Keyboard</option>
                                <option class="id">250 Keyboard</option>
                            </select>
                            <em>450,000 keyword checks in total?</em>
                        </div>
                        <ul>
                            <li><strong>10</strong> websites</li>
                            <li>Website Audit for <strong>40,000</strong> pages</li>
                            <li>Monitoring for <strong>6,000</strong> backlinks</li>
                            <li>Check backlinks for 20 domains/day</li>
                            <li>Keyword Grouper</li>
                            <li>Competitive and keyword research</li>
                            <li>On-page audit: 150 pages</li>
                            <li>Marketing Plan</li>
                            <li>Flexible SEO reporting</li>
                            <li>Social Media Analytics and Management</li>
                        </ul>
                        <div class="see-all"><a href="#">See full listing</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="page-plan-box page-plan-box-cntr">
                        <span>MOST POPULAR</span>
                        <div class="price">$71<em>/month</em></div>
                        <div class="buy-now"><a href="#">Buy Now</a></div>
                        <div class="rank-rating">
                            <p>Rank Tracking:</p>
                            <select>
                                <option class="id">1000 Keyboard</option>
                                <option class="id">7500 Keyboard</option>
                            </select>
                            <em>1,800,000 keyword checks in total</em>
                        </div>
                        <ul>
                            <li><strong>Unlimited</strong> number of websites</li>
                            <li>Website Audit for <strong>250,000</strong> pages</li>
                            <li>Monitoring for <strong>30,000</strong> backlinks</li>
                            <li>Check backlinks for <strong>100</strong> domains/day</li>
                            <li>Keyword Grouper</li>
                            <li>Competitive and keyword research</li>
                            <li>On-page audit: <strong>450</strong> pages</li>
                            <li>Marketing Plan</li>
                            <li>Flexible SEO reporting</li>
                            <li>Social Media Analytics and Management</li>
                        </ul>
                        <div class="see-all"><a href="#">See full listing</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="page-plan-box">
                        <span>business</span>
                        <div class="price">$151<em>/month</em></div>
                        <div class="buy-now"><a href="#">Buy Now</a></div>
                        <div class="rank-rating">
                            <p>Rank Tracking:</p>
                            <select>
                                <option class="id">2500 Keyboard</option>
                                <option class="id">2500 Keyboard</option>
                                <option class="id">2500 Keyboard</option>
                                <option class="id">2500 Keyboard</option>
                            </select>
                            <em>1,800,000 keyword checks in total</em>
                        </div>
                        <ul>
                            <li><strong>Unlimited</strong> number of websites</li>
                            <li>Website Audit for <strong>700,000</strong> pages</li>
                            <li>Monitoring for <strong>90,000</strong> backlinks</li>
                            <li>Check backlinks for <strong>300</strong> domains/day</li>
                            <li>Keyword Grouper</li>
                            <li>Competitive and keyword research</li>
                            <li>On-page audit: <strong>750</strong> pages</li>
                            <li>Marketing Plan</li>
                            <li>Flexible SEO reporting</li>
                            <li>Social Media Analytics and Management</li>
                        </ul>
                        <div class="see-all"><a href="#">See full listing</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="saction-price-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="price-contact-box">
                    <img src="{{ asset('assets/front/images/girl-with_phone.jpg') }}">
                </div>
            </div>

            <div class="col-md-7">
                <div class="price-contact-box-left">
                    <div class="form">
                        <h4>GET IN TOUCH</h4>
                        <h2 class="form-headline">Send us a message</h2>
                        <form id="submit-form" action="">
                            <div class="from-left">
                                <input id="name" class="form-input" type="text" placeholder="Your Name*">
                            </div>
                            <div class="from-right">
                                <input id="email" class="form-input" type="email" placeholder="Your Email*">
                            </div>
                            <div class="from-left">
                                <input id="phone" class="form-input" type="phone" placeholder="Your Phone*">
                            </div>
                            <div class="from-right">
                                <input id="company-name" class="form-input" type="text" placeholder="Company Name*"
                                    required>
                            </div>
                            <div class="from-msg">
                                <textarea minlength="20" id="message" cols="30" rows="7" placeholder="Your Message*"
                                    required></textarea>
                            </div>
                            <div class="from-check">
                                <input type="checkbox" id="checkbox" name="checkbox" checked> Yes, I would like to
                                receive communications by call / email about Company's services.
                            </div>
                            <p class="full-width">
                                <input type="submit" class="submit-btn" value="Submit" onclick="checkValidations()">
                            </p>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@push('scripts')
@endpush

@endsection