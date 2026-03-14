@extends('frontend.layouts.app')

@section('title', 'continue-with-email')
@section('content')
<section class="otp-section">
    <div class="otp-box">
        <h2>Login With Code</h2>

        <p class="otp-desc">
        Last step! To secure your account, enter the code we just sent to 9898989898
        </p>

        <div class="otp-inputs">
            <input type="text" maxlength="1" class="otp">
            <input type="text" maxlength="1" class="otp">
            <input type="text" maxlength="1" class="otp">
            <input type="text" maxlength="1" class="otp">
            <input type="text" maxlength="1" class="otp">
            <input type="text" maxlength="1" class="otp">
        </div>

        <button class="otp-btn">
        Login
        </button>

        <p class="resend-text">
        Didn't get the code? Resend in 01:39
        </p>

        <a href="#" class="cancel-btn">CANCEL</a>
    </div>
</section>
@endsection