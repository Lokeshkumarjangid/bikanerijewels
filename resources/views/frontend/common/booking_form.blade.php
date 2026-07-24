<section class="appointment-section">

    <div class="appointment-container">

        <h2 class="appointment-title">
            BOOK AN APPOINTMENT
        </h2>
        <div class="appointment-layout">
            {{-- Left Image --}}
            <div class="appointment-image">
                <picture>
                    <img
                        src="{{ asset('image/bookingappoint.jpg') }}"
                        alt="Book Appointment"
                    >
                </picture>
            </div>
            {{-- Right Form --}}
            <div class="appointment-form-wrapper">

                <form id="quickForm" method="POST" action="{{route('storecontactus')}}">
                @csrf
                    <div class="form-group">
                        <input
                            type="text"
                            placeholder="Name*"
                            name = 'name'
                            class="appointment-input"
                        >
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input
                            type="email"
                            placeholder="Email address*"
                            name='email'
                            class="appointment-input"
                        >
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input
                            type="Number"
                            placeholder="Mobile number*"
                            name='mobile'
                            class="appointment-input"
                        >
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input
                            type="City"
                            placeholder="City*"
                            name='city'
                            class="appointment-input"
                        >
                        @error('city')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="appointment-row">
                        <div class="form-group">
                            <input
                                type="text"
                                class="appointment-input"
                                name='state'
                                placeholder="State*"
                            >
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                                type="text"
                                class="appointment-input"
                                name='store'
                                placeholder="Store"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea
                            class="appointment-textarea"
                            placeholder="Address*"
                            name='address'
                        ></textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="appointment-button"
                        id="submitBtn"
                    >
                        Send
                    </button>

                </form>

            </div>

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