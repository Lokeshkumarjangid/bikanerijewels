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
<div class="heading-contactus text-center mb-5">
    <span class="contact-subtitle"></span>

    <h2 class="contact-title">
        Experience the Legacy of
        <span>Bikaneri Jewels</span>
    </h2>

    <p class="contact-description">
        For over eight decades, Bikaneri Jewels has crafted timeless masterpieces that
        blend India's rich heritage with contemporary elegance. Every creation reflects
        exceptional craftsmanship, unmatched quality, and a passion for perfection.
        Whether you're searching for bridal jewellery, bespoke designs, or heirloom
        treasures, our experts are here to help you find a piece that tells your unique story.
        Visit us and experience luxury, trust, and artistry like never before.
    </p>
</div>
<section class="py-5">
    <div class="container">
        <div class="row g-4 text-center">

            <!-- Address -->
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="contact-card w-100">
                    <h5>Address</h5>
                    <p>
                        Office no. 11, Sputnik Building,<br>
                        Breach Candy, Mumbai,<br>
                        400026
                    </p>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="contact-card w-100">
                    <h5>Phone</h5>
                    <p>+91 99673 52183</p>
                </div>
            </div>

            <!-- Email -->
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="contact-card w-100">
                    <h5>Email</h5>
                    <p>sales@bikanerijewels.com</p>
                </div>
            </div>

            <!-- Working Hours -->
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="contact-card w-100">
                    <h5>Working Hours</h5>
                    <p>
                        Monday - Saturday<br>
                        10:00 AM - 7:00 PM
                    </p>
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
            <input type="hidden" name="type" value="2">
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3773.177486344463!2d72.8039084!3d18.9677674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cd43f618676d%3A0xa64ce3707f9e4668!2sBikaneri%20Jewels!5e0!3m2!1sen!2sin!4v1785930700568!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
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