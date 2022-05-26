@extends('layouts.public')
@section('content')



<div class="banner-blog">
    <div class="container">
        <div class="row">
            <h2>Contact Us</h2>
            <ul>
                <li><a href="/">Home</a></li>
                <li>/</li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>


<div class="contact-form-area pt-100 pb-70">
    <div class="container">
     <div class="section-title text-center">
    <h2>Let's Send Us a Message Below</h2>
    </div>
    <div class="row pt-45">
    <div class="col-lg-4">
    <div class="contact-info mr-20">
    <span>Contact Info</span>
    <h2>Let's Connect With Us</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam imperdiet varius mi, ut hendrerit magna mollis ac. </p>
    <ul>
    <li>
    <div class="content">
    <img src="{{ asset('assets/images/telephone.png') }}">
    <h3>Phone Number</h3>
    <a href="tel:+1(212)-255-5511">+1 (212) 255-5511</a>
    </div>
    </li>
    <li>
    <div class="content">
   <img src="{{ asset('assets/images/home.png') }}">
    <h3>Address</h3>
    <span>124 Virgil A Virginia, USA</span>
    </div>
    </li>
    <li>
    <div class="content">
        <img src="{{ asset('assets/images/mail.png') }}">
    <h3>Contact Info</h3>
    <a href="mailto:hello@techex.com">hello@techex.com</a>
    </div>
    </li>
    </ul>
    </div>
    </div>
    <div class="col-lg-8">
    <div class="contact-form">
    <form id="contactForm" novalidate="true">
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label>Your Name <span>*</span></label>
    <input type="text" name="name" id="name" class="form-control" required="" data-error="Please Enter Your Name" placeholder="Name">
    <div class="help-block with-errors"></div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <label>Your Email <span>*</span></label>
    <input type="email" name="email" id="email" class="form-control" required="" data-error="Please Enter Your Email" placeholder="Email">
    <div class="help-block with-errors"></div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <label>Phone Number <span>*</span></label>
    <input type="text" name="phone_number" id="phone_number" required="" data-error="Please Enter Your number" class="form-control" placeholder="Phone Number">
    <div class="help-block with-errors"></div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <label>Your Subject <span>*</span></label>
    <input type="text" name="msg_subject" id="msg_subject" class="form-control" required="" data-error="Please Enter Your Subject" placeholder="Your Subject">
    <div class="help-block with-errors"></div>
    </div>
    </div>
    <div class="col-lg-12 col-md-12">
    <div class="form-group">
    <label>Your Message <span>*</span></label>
    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required="" data-error="Write your message" placeholder="Your Message"></textarea>
    <div class="help-block with-errors"></div>
    </div>
    </div>
    <div class="col-lg-12 col-md-12">
    <div class="agree-label">
    <input type="checkbox" id="chb1">
    <label for="chb1">
    Accept <a href="terms-condition.html">Terms &amp; Conditions</a> And <a href="privacy-policy.html">Privacy Policy.</a>
    </label>
    </div>
    </div>
    <div class="col-lg-12 col-md-12 text-center">
    <button type="submit" class="default-btn btn-bg-two border-radius-50 disabled" style="pointer-events: all; cursor: pointer;">
    Send Message <i class="bx bx-chevron-right"></i>
    </button>
    <div id="msgSubmit" class="h3 text-center hidden"></div>
    <div class="clearfix"></div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>


@endsection