@extends('layouts.auth')
@section('content')
<div class="login-new">
  <div class="row">
    <div class="col-md-6">
      <div class="left-login-new register-page">
        <div class="container">
          <div class="row justify-content-center">
            <div class="card rigestr-page">
              <div class="card-header">{{ __('Register') }}</div>
              <div class="hadder-login">
              <div class="logo">
               <a href="#"><img src="http://billionmedia.test/assets/images/logo-img.png" alt="" width="180"></a>
                </div>
                <h3>Sign Up For A Free Account</h3>
                <p>Complete the form below to become an SEO Scientist</p>
              </div>
              {{--<div class="social-btn">
              <a href="#" class="fb"><img src="assets/images/facebook.png">Sign in with Facebook</a> 
              <a href="#" class="google"><img src="assets/images/google.png">Sign in with Google</a> 
             </div>
             <div class="or-box">
             <div class="inner-or-box">Or</div>
             </div>--}}
              <div class="card-body register-from">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="form-group row name-fild">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
                  </div>
                  <div class="form-group row mai-fild">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-6">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                      @error('email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
                  </div>
                  <div class="form-group row pas-fild">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-6">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      @error('password') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
                  </div>
                  <div class="form-group row confmpas-fild">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <div class="col-md-6">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                  <div class="rigestr-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">I accept the <a href="{{ route('public.termsandConditions') }}">Terms & conditions</a></label>
                  </div>
                  <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary"> {{ __('Sign Up Free') }} </button>
                    </div>
                  </div>
                  <div class="alrdy-btn">
                    <p>Already have an account? <a href="{{route('login')}}">Log in now</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="right-login-new reg"><img src="assets/images/seo-science-logo.png"> </div>
    </div>
  </div>

  </div> 
</div>
@endsection
