@extends('frontend.layouts.app')

@section('title', 'customize')
@section('content') 
<style>
.containers{
max-width:1400px;
padding:40px 20px;
}

/* GRID */

.customize-grid{
display:grid;
grid-template-columns:1fr 2fr 1fr;
gap:25px;
}

/* CARD */

.card{
background:#fff;
padding:25px;
border-radius:10px;
box-shadow:0 4px 10px rgba(0,0,0,0.08);
}

/* FORM GRID */

.form-grid{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:14px;
margin-top:20px;
}

/* INPUT */

.form-group{
display:flex;
flex-direction:column;
}

.form-group label{
font-size:13px;
margin-bottom:5px;
color:#555;
}

input,
select,
textarea{
padding:10px;
border:1px solid #ddd;
border-radius:6px;
font-size:14px;
width:100%;
}

/* TEXTAREA */

.full{
grid-column:1/4;
}

textarea{
height:80px;
}

/* BUTTON */

.submit-btn{
margin-top:20px;
width:100%;
padding:12px;
border:none;
background:#3fa5ab;
color:#fff;
border-radius:6px;
font-size:16px;
cursor:pointer;
}

/* UPLOAD */

.upload-area{
border:2px dashed #ddd;
padding:40px;
text-align:center;
border-radius:8px;
}

/* CONTACT */

.contact-card input,
.contact-card textarea{
margin-bottom:12px;
}

/* RESPONSIVE */

@media(max-width:1100px){

.customize-grid{
grid-template-columns:1fr;
}

.form-grid{
grid-template-columns:1fr 1fr;
}

.full{
grid-column:1/3;
}

}

@media(max-width:600px){

.form-grid{
grid-template-columns:1fr;
}

.full{
grid-column:auto;
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

<section class="customize-wrapper">

<div class="containers">

<div class="customize-grid">

<!-- LEFT : Upload -->
<div class="card upload-card">

<h3>Upload Your Design</h3>

<div class="upload-area">
<i class="fa fa-camera"></i>
<p>Upload Image (Max 5MB)</p>
<input type="file">
</div>

</div>


<!-- CENTER : Jewellery Specifications -->

<div class="card spec-card">

<h3>Jewellery Specifications</h3>

<form>

<div class="form-grid">

<!-- Diamond Section -->

<div class="form-group">
<label>Diamond Clarity</label>
<select>
<option>Select</option>
</select>
</div>

<div class="form-group">
<label>Diamond Shape</label>
<select>
<option>Select</option>
</select>
</div>

<div class="form-group">
<label>Diamond Size</label>
<input type="text">
</div>

<div class="form-group">
<label>Diamond Color</label>
<select>
<option>Select</option>
</select>
</div>

<!-- Gold Section -->

<div class="form-group">
<label>Gold Colour</label>
<select>
<option>Select</option>
</select>
</div>

<div class="form-group">
<label>Gold Purity</label>
<select>
<option>Select</option>
</select>
</div>

<div class="form-group">
<label>Metal Weight</label>
<input type="text">
</div>

<div class="form-group">
<label>Jewellery Type</label>
<select>
<option>Select</option>
</select>
</div>

<!-- Ring -->

<div class="form-group">
<label>Ring Size</label>
<input type="text">
</div>

<div class="form-group">
<label>Setting Type</label>
<select>
<option>Select</option>
</select>
</div>

<div class="form-group">
<label>Stone Type</label>
<select>
<option>Select</option>
</select>
</div>

<div class="form-group">
<label>Stone Weight</label>
<input type="text">
</div>

<!-- Delivery -->

<div class="form-group">
<label>Delivery Date</label>
<input type="date">
</div>

<div class="form-group">
<label>Occasion</label>
<select>
<option>Select</option>
</select>
</div>

<div class="form-group">
<label>Budget</label>
<input type="text">
</div>

<!-- Description -->

<div class="form-group full">
<label>Describe your design</label>
<textarea></textarea>
</div>

</div>

<button class="submit-btn">Submit</button>

</form>

</div>


<!-- RIGHT : Contact -->

<div class="card contact-card">

<h3>Your Contact Details</h3>

<input type="text" placeholder="Name">
<input type="email" placeholder="Email">
<input type="text" placeholder="Mobile">
<textarea placeholder="Address"></textarea>

</div>


</div>

</div>

</section>
@endsection