<section class="book-visit">
    <div class="container">
        <div class="book-box">
            <h2>BOOK APPOINTMENT</h2>
            <form id="quickForm" method="POST" action="{{route('storecontactus')}}">
                @csrf
                <div class="row">
                    <input type="hidden" name="type" value="4">
                    <div class="col-md-6 form-group">
                        <input type="text" placeholder="Full Name" name="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group">
                        <input type="email" placeholder="Email" name="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group">
                        <input type="number" placeholder="Mobile" name='mobile'>
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group">
                        <textarea type="text" placeholder="Address" name="address"></textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group">
                        <input type="text" placeholder="Store" name="store">
                    </div>

                    <div class="col-md-6 form-group">
                        <input type="text" placeholder="City" name="city">
                        @error('city')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group">
                        <input type="text" placeholder="State" name="state">
                        @error('state')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" id="submitBtn">SUBMIT</button>

            </form>
        </div>
    </div>
</section>
@section('scripts')
<script>
    let isSubmitting = false;
    $(function () {
    $('#quickForm').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            mobile: {
                required: true,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
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
            if (isSubmitting) {
                return false;
            }

            isSubmitting = true;

            $('#submitBtn')
                .prop('disabled', true)
                .html('Submitting...');

            form.submit();
        }
    });
    });
</script>
@endsection