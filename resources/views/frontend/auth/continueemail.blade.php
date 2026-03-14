@extends('frontend.layouts.app')

@section('title', 'continue-with-mobile')
@section('content')
<section class="mobile-login-section">
    <div class="mobile-login-box">
        <h2>Continue With Email</h2>
        <p class="mobile-desc">
        We'll check if you have an account, and help create one if you don't.
        </p>
        <form>
            <div class="form-group">
                <label>Enter Email No</label>
                <input type="text" placeholder="Enter Email Number">
            </div>

            <button type="submit" class="submit-btn">
            SUBMIT
            </button>
            <a href="#" class="cancel-btn">CANCEL</a>
        </form>
    </div>
</section>
@endsection