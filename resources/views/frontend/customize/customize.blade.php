@extends('frontend.layouts.app')

@section('title', 'product-details')
@section('content') 
<style>
   body{
font-family:Arial;
background:#f6f7f9;
margin:0;
}

.container{
width:1200px;
margin:auto;
}

.title{
text-align:center;
margin-top:40px;
font-size:32px;
}

.subtitle{
text-align:center;
color:#777;
margin-bottom:40px;
}


/* steps */

.steps{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
margin-bottom:40px;
}

.step{
background:#fff;
padding:20px;
text-align:center;
border-radius:8px;
box-shadow:0 2px 5px rgba(0,0,0,0.08);
}


/* cards */

.form-grid{
display:grid;
grid-template-columns:1fr 1fr 1fr;
gap:25px;
}

.card{
background:#fff;
padding:25px;
border-radius:10px;
box-shadow:0 3px 8px rgba(0,0,0,0.1);
}

.card h3{
margin-bottom:20px;
}


/* upload */

.upload-box{
height:180px;
border:2px dashed #ddd;
display:flex;
align-items:center;
justify-content:center;
margin-bottom:20px;
}

.upload-box img{
width:70px;
opacity:0.6;
}

.upload-btn{
background:#3ca7b2;
color:white;
padding:10px;
border:none;
width:100%;
cursor:pointer;
border-radius:4px;
}

.file-type{
text-align:center;
color:#888;
font-size:13px;
margin-top:10px;
}


/* form */

select,
input,
textarea{
width:100%;
padding:10px;
margin-bottom:12px;
border:1px solid #ddd;
border-radius:4px;
}

textarea{
height:90px;
}

.budget{
display:flex;
gap:10px;
}

.submit-btn{
background:#3ca7b2;
color:white;
border:none;
padding:12px;
width:100%;
font-size:16px;
cursor:pointer;
margin-top:10px;
}


/* contact */

.contact .help{
margin-top:10px;
color:#666;
font-size:13px;
}

.whatsapp{
color:#25D366;
}


/* responsive */

@media(max-width:992px){

.container{
width:90%;
}

.form-grid{
grid-template-columns:1fr;
}

.steps{
grid-template-columns:1fr 1fr;
}

}

@media(max-width:600px){

.steps{
grid-template-columns:1fr;
}

.title{
font-size:26px;
}

}
</style>
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Customize</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="customize">

<div class="container">

<h2 class="title">CUSTOMIZE YOUR JEWELLERY</h2>
<p class="subtitle">Your Design ... Our Craftsmanship...!</p>


<!-- STEPS -->

<div class="steps">

<div class="step">
<h4>STEP 1</h4>
<p>Share your jewellery design idea.</p>
</div>

<div class="step">
<h4>STEP 2</h4>
<p>Cost estimation and analysis.</p>
</div>

<div class="step">
<h4>STEP 3</h4>
<p>We cast the perfect mould.</p>
</div>

<div class="step">
<h4>STEP 4</h4>
<p>Your jewellery is ready.</p>
</div>

</div>


<!-- MAIN FORM -->

<div class="form-grid">


<!-- Upload -->

<div class="card upload">

<h3>UPLOAD YOUR DESIGN</h3>

<div class="upload-box">
<img src="https://cdn-icons-png.flaticon.com/512/685/685655.png">
</div>

<button class="upload-btn">
UPLOAD IMAGE (MAX 5MB)
</button>

<p class="file-type">JPG, PNG or PDF</p>

</div>


<!-- Specs -->

<div class="card">

<h3>Jewellery Specifications</h3>

<label>Diamond Clarity</label>
<select>
<option>Please select</option>
</select>

<label>Gold Colour</label>
<select>
<option>Please select</option>
</select>

<label>Gold Purity</label>
<select>
<option>Please select</option>
</select>

<label>Your Budget</label>

<div class="budget">
<select>
<option>₹ INR</option>
</select>

<input type="text" placeholder="Your Budget">
</div>

<textarea placeholder="Describe your design idea"></textarea>

<button class="submit-btn">SUBMIT</button>

</div>


<!-- Contact -->

<div class="card contact">

<h3>Your Contact Details</h3>

<input type="text" placeholder="Name">
<input type="email" placeholder="Email Id">
<input type="text" placeholder="Mobile Number">
<textarea placeholder="Address"></textarea>

<p class="help">IN CASE OF ANY QUERIES CALL US ON</p>

<h4>+91 22 61066262</h4>

<p>OR Whatsapp Us!</p>

<h4 class="whatsapp">+91 9920024599</h4>

</div>


</div>

</div>

</section>
<br><br><br>
@endsection