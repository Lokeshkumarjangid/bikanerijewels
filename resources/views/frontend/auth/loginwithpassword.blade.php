@extends('frontend.layouts.app')

@section('title', 'continue-with-mobile')
@section('content')
<section class="mobile-login-section">
    <div class="mobile-login-box">

        <h2 class="login-title">Login with Password</h2>

        <p class="mobile-desc">
            Using {{session('login_value')}}
        </p>

        <form id="quickForm" action="{{route('loginemail')}}" method="POST">
            @csrf

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

            <button type="submit" class="submit-btn">
                Login
            </button>

            <a href="#" class="cancel-btn">CANCEL</a>
        </form>

    </div>
</section>
@endsection
@section('scripts')
<script>
    $(function () {
    $('#quickForm').validate({
        rules: {
        password: {
            required: true,
        },
        },
        messages: {
        password: {
            password: "Please enter password",
        },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
           $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    });
</script>
@endsection