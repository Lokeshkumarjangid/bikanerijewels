<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function loginoption(){
        return view('frontend.auth.loginoption');
    }

    function register(){
        return view('frontend.auth.register');
    }

    function continuewithmobile(){
        return view('frontend.auth.continuemobile');
    }

    function continuewithemail(){
        return view('frontend.auth.continueemail');
    }

    function otp(){
        return view('frontend.auth.otp');
    }
}
