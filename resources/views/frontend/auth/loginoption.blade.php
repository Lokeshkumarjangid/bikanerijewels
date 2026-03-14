@extends('frontend.layouts.app')

@section('title', 'login-option')
@section('content') 
<section class="login-section">
    <div class="login-box">
        <h2>Log in or sign up in seconds</h2>
        <p class="login-desc">Use your email or mobile number to continue with the organization.</p>
        <a href="{{route('continuewithemail')}}" class="login-btn"><i class="fa fa-envelope-o"></i>Continue with email</a>
        <a href="{{route('continuewithmobile')}}" class="login-btn"><i class="fa fa-mobile"></i>Log in with mobile</a>
        <p class="login-terms">
            By continuing, you agree to our Terms of Use. Read our Privacy Policy.
        </p>
    </div>
</section>
@endsection