@extends('frontend.layouts.app')

@section('title', 'register')
@section('content')
<style>
    .register-section{
background:#f4f4f4;
padding:80px 20px;
}

.register-container{
max-width:520px;
margin:auto;
text-align:center;
}

.register-title{
font-size:42px;
color:#777;
margin-bottom:40px;
}

.form-group{
margin-bottom:22px;
position:relative;
}

.form-group label{
display:block;
text-align:left;
font-size:14px;
margin-bottom:6px;
color:#777;
}

.form-group input{
width:100%;
padding:16px;
border:1px solid #ccc;
border-radius:4px;
font-size:16px;
background:#fff;
}

/* password eye icon */

.password-field input{
padding-right:45px;
}

.eye-icon{
position:absolute;
right:15px;
top:50%;
transform:translateY(-50%);
font-size:18px;
color:#777;
cursor:pointer;
}

/* button */

.register-btn{
width:100%;
padding:18px;
background:#000;
color:#fff;
border:none;
font-size:16px;
letter-spacing:1px;
cursor:pointer;
margin-top:15px;
}

.register-btn:hover{
background:#333;
}
</style>
<section class="register-section">
    <div class="register-container">
        <h2 class="register-title">Register</h2>
        <form>
            <div class="form-group">
                <input type="text" placeholder="Business name">
            </div>

            <div class="form-group">
                <input type="text" placeholder="First Name">
            </div>

            <div class="form-group">
                <input type="text" placeholder="Last Name">
            </div>

            <div class="form-group">
                <input type="text" placeholder="Pan card">
            </div>

            <div class="form-group">
                <label>Mobile No.</label>
                <input type="text" value="7894561230">
            </div>

            <div class="form-group">
                <input type="email" placeholder="Email">
            </div>

            <div class="form-group password-field">
                <input type="password" placeholder="Password">
                <span class="eye-icon toggle-password">
                <i class="fa fa-eye"></i>
                </span>
            </div>

            <div class="form-group password-field">
                <input type="password" placeholder="Confirm Password">
                <span class="eye-icon toggle-password">
                <i class="fa fa-eye"></i>
                </span>
            </div>

            <button class="register-btn">
                CREATE ACCOUNT
            </button>
        </form>
    </div>
</section>
@endsection