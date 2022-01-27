@extends('layouts.auth')
@section('content')
<div class="login-new">
  <div class="row">
    <div class="col-md-6">
    <div class="left-login-new rest-poswrod">    
    <div class="container">
  <div class="row justify-content-center">
    <div class="card rest-pasword">
      <div class="card-header">{{ __('Reset Password') }}</div>
      <div class="hadder-login">
      <div class="logo">
       <a href="#"><img src="http://billionmedia.test/assets/images/logo-img.png" alt="" width="180"></a>
        </div>
        <h3>Password recovery</h3>
        <p>If you have forgotten your password, you can use this form to set a new one. If you need more help, just contact our support department.</p>
      </div>
      <div class="card-body"> @if (session('status'))
        <div class="alert alert-success" role="alert"> {{ session('status') }} </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
          @csrf
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary"> {{ __('Send Password Reset Link') }} </button>
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
      <div class="right-login-new rest-pas-right"> 
    <img src="/assets/images/seo-image.png"> </div>
    </div>
  </div>
</div>
@endsection
