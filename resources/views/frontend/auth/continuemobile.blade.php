@extends('frontend.layouts.app')

@section('title', 'continue-with-mobile')
@section('content')
<section class="mobile-login-section">
    <div class="mobile-login-box">
        <h2>Continue With Mobile</h2>
        <p class="mobile-desc">
        We'll check if you have an account, and help create one if you don't.
        </p>
        <form id="quickForm" action="{{route('loginwithmobile')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Enter Mobile No</label>
                <input type="text" placeholder="Enter Mobile Number" name='mobile_no'>
                @error('mobile_no')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
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
        mobile_no: {
            required: true,
        },
        },
        messages: {
        mobile_no: {
            required: "Please enter a mobile number",
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