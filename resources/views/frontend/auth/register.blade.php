@extends('frontend.layouts.app')

@section('title', 'register')
@section('content')
<section class="register-section">
    <div class="register-container">
        <h2 class="register-title">Register</h2>
        <form id="registerForm" action="{{ route('registerstore') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Business name</label>
                <input type="text" placeholder="Business name" name='business_name' value="{{old('business_name')}}">
                @error('business_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>First Name</label>
                <input type="text" placeholder="First Name" name='first_name' value="{{old('first_name')}}">
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" placeholder="Last Name" name='last_name' value="{{old('last_name')}}">
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Pan card</label>
                <input type="text" placeholder="Pan card" name='pancard' value="{{old('pancard')}}">
                @error('pancard')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Mobile No</label>
                <input type="text" name="mobile"
                value="{{ session('login_type') == 'mobile' ? session('login_value') : old('mobile') }}"
                {{ session('login_type') == 'mobile' ? 'readonly' : '' }} placeholder="mobile">
                @error('mobile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                value="{{ session('login_type') == 'email' ? session('login_value') : old('email') }}"
                {{ session('login_type') == 'email' ? 'readonly' : '' }} placeholder="email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group password-field">
                <label>Password</label>
                <input type="password" placeholder="Password" name='password'>
                <span class="eye-icon toggle-password">
                <i class="fa fa-eye"></i>
                </span>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group password-field">
                <label> Confirm Password</label>
                <input type="password" placeholder="Confirm Password" name='password_confirmation'>
                <span class="eye-icon toggle-password">
                <i class="fa fa-eye"></i>
                </span>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button class="register-btn" type="submit">
                CREATE ACCOUNT
            </button>
        </form>
    </div>
</section>
@endsection
@section('scripts')
<script>
$(function () {

    $('#registerForm').validate({
        rules: {
            business_name: {
                required: true
            },
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            pancard: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                equalTo: "[name='password']"
            }
        },
        messages: {
            business_name: {
                required: "Please enter business name"
            },
            first_name: {
                required: "Please enter first name"
            },
            last_name: {
                required: "Please enter last name"
            },
            pancard: {
                required: "Please enter PAN card",
                minlength: "PAN must be 10 characters",
                maxlength: "PAN must be 10 characters"
            },
            email: {
                required: "Please enter email",
                email: "Enter valid email"
            },
            password: {
                required: "Please enter password",
                minlength: "Minimum 6 characters"
            },
            password_confirmation: {
                required: "Please confirm password",
                equalTo: "Passwords do not match"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            element.closest('.form-group').append(error);
        },
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});
</script>
@endsection