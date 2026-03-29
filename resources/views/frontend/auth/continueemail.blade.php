@extends('frontend.layouts.app')

@section('title', 'continue-with-mobile')
@section('content')
<section class="mobile-login-section">
    <div class="mobile-login-box">
        <h2>Continue With Email</h2>
        <p class="mobile-desc">
        We'll check if you have an account, and help create one if you don't.
        </p>
        <form form id="quickForm" action="{{route('loginwithemail')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Enter Email</label>
                <input type="text" placeholder="Enter Email" name='email'>
            </div>

            <button type="submit" class="submit-btn">
            SUBMIT
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
        email: {
            required: true,
            email: true
        },
        },
        messages: {
        email: {
            required: "Please enter email",
            email: "Please enter a valid email address"
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