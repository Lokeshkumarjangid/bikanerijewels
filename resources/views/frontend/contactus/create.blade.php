@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@section('content')

<style>
/* Hero Section */
.contact-hero {
    background: linear-gradient(135deg, #f5f7fa, #fceae3);
    padding: 80px 0;
}
.contact-hero h1 {
    font-weight: 700;
    font-size: 42px;
}
.contact-hero p {
    color: #555;
}

/* Cards */
.contact-card {
    border-radius: 12px;
    padding: 25px;
    text-align: center;
    background: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: 0.3s;
}
.contact-card:hover {
    transform: translateY(-5px);
}

/* Form */
.contact-form {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}
.contact-form input,
.contact-form textarea {
    border-radius: 8px;
}

/* CTA */
.contact-cta {
    background: linear-gradient(135deg, #0d2b55, #163d7a);
    color: #fff;
    padding: 40px;
    border-radius: 12px;
}

/* Mobile */
@media(max-width:768px){
    .contact-hero h1 {
        font-size: 28px;
    }
}
</style>

<!-- Hero -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Contact Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Info Cards -->
<section class="py-5">
  <div class="container">
    <div class="row text-center">

      <div class="col-md-3 mb-3">
        <div class="contact-card">
          <h5>Address</h5>
          <p>Jaipur, Rajasthan</p>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="contact-card">
          <h5>Phone</h5>
          <p>+91 98765 43210</p>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="contact-card">
          <h5>Email</h5>
          <p>info@example.com</p>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="contact-card">
          <h5>Working Hours</h5>
          <p>Mon - Sat: 10AM - 7PM</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Form + Map -->
<section class="pb-5" id="form">
  <div class="container">
    <div class="row">

      <!-- Form -->
      <div class="col-md-6 mb-4">
        <div class="contact-form">

          <form id="quickForm" method="POST" action="{{route('storecontactus')}}">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" placeholder="Enter Name" name='name'>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" placeholder="Enter Email" name='email'>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Mobile</label>
                <input type="number" placeholder="Enter Mobile" name='mobile'>
                @error('mobile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control mb-3" rows="4" placeholder="Your Message"></textarea>
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary w-100">Send Message</button>
          </form>
        </div>
      </div>

      <!-- Map -->
      <div class="col-md-6">
        <iframe 
          src="https://maps.google.com/maps?q=jaipur&t=&z=13&ie=UTF8&iwloc=&output=embed"
          width="100%" height="100%" style="min-height:350px;border-radius:12px;">
        </iframe>
      </div>

    </div>
  </div>
</section>
@endsection
@section('scripts')
<script>
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
            message: {
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
            form.submit();
        }
    });
    });
</script>
@endsection