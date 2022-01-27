@extends('layouts.auth')
@section('content')
<div class="login-new">
    <div class="row">
        <div class="col-md-6">
            <div class="left-login-new">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="card">
                            <div class="card-header">{{ __('Welcome back!') }}</div>
                            <div class="card-body">
                                <div class="hadder-login">
                                    <div class="logo">
                                        <a href="#"><img src="http://billionmedia.test/assets/images/logo-img.png"
                                                alt="" width="180"></a>
                                    </div>
                                    <h3>Log in to your account</h3>
                                    <p>If you are already a member, please enter your login details in the form below.
                                    </p>
                                </div>
                                <div class="social-btn">
                                    <a href="#" class="fb"><img src="assets/images/facebook.png">Sign in with
                                        Facebook</a>
                                    <a href="#" class="google"><img src="assets/images/google.png">Sign in with
                                        Google</a>
                                </div>
                                <div class="or-box">
                                    <div class="inner-or-box">Or</div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group row email-fild">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail
                                            Address')
                                            }}</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row pssword-fild">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{
                                            __('Password')
                                            }}</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                            <a class="btn btn-warning" href="{{ route('register') }}">{{ __('Sign Up
                                                Free') }}</a>
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="right-login-new">
             <img src="assets/images/seo-image.png">
            </div>
        </div>
    </div>
</div>











@endsection