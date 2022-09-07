<div class="saction-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="box-footer">
                    <h3>Features</h3>
                    <ul>
                        <li><a href="{{ route('public.aboutSeoScience') }}">About Us</a></li>
                        <li><a href="{{ route('public.termsandConditions') }}">Terms and Conditions</a></li>
                        <li><a href="{{ route('public.privacypolicy') }}">Privacy Policy</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-footer">
                    <h3>Product:</h3>
                    <ul>
                        <li><a href="{{route('register')}}">Create Account</a></li>
                        <li><a href="{{route('login')}}">Log In</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-footer">
                    <h3>Contact:</h3>
                    <p>info@seoscience.com</p>
                    {{-- <ul class="social-icon">
                        <li><a href="#"><img src="{{ asset('assets/front/images/Icon.png') }}"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/front/images/Icon(2).png') }}"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/front/images/Icon(3).png') }}"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/front/images/Icon(1).png') }}"></a></li>
                    </ul> --}} 
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-footer">
                    <h3>Newsletter:</h3>
                    <div class="from-news">
                        <form>
                            <input name="name" placeholder="Name" type="">
                            <input name="email" placeholder="Email Address" type="">
                            <div class="check">
                                <input type="checkbox" id="html">
                                <label for="html">I confirm I agree with the Terms and Conditions and the Privacy Policy</label>
                                <button class="buttion-send">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-rught">
            <p>SEO Science © 2022. All Rights Reserved</p>
        </div>
    </div>
</div>