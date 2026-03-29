<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

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

    function loginwithmobile(Request $request){
        $request->validate([
            'mobile_no' => 'required|digits:10'
        ]);

        $user = User::where('mobile', $request->mobile_no)->first();

        if ($user) {
            if($user->status == '0'){
                return redirect()->back()->with('error', 'Your account not active.Please contact to admin.');
            }else{
                session([
                    'login_value' => $request->mobile_no,
                    'login_type' => 'mobile'
                ]);
                $user->update(['otp'=>'123456']);
                return redirect()->route('otp')->with('success', 'OTP sent to your mobile number');
            }
        } else {
            session([
                'login_value' => $request->mobile_no,
                'login_type' => 'mobile'
            ]);
            return redirect()->route('register')->with('error', 'Your mobile number is not registered. Please register first.');
        }
    }
    
    public function registerstore(Request $request)
    {
        $loginType  = session('login_type');
        $loginValue = session('login_value');

        if (!$loginType || !$loginValue) {
            return redirect()->route('loginoption')->with('error', 'Session expired, please try again');
        }
        $rules = [
            'business_name' => 'required|string|max:255',
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'pancard'       => 'required|string|size:10',
            'password'      => 'required|min:6|confirmed',
        ];

        if ($loginType == 'mobile') {
            $rules['email'] = 'required|email|unique:users,email';
        }

        if ($loginType == 'email') {
            $rules['mobile'] = 'required|digits:10|unique:users,mobile';
        }

        $request->validate($rules);

        $mobile = $loginType == 'mobile' ? $loginValue : $request->mobile;
        $email  = $loginType == 'email'  ? $loginValue : $request->email;

        $user = User::create([
            'business_name' => $request->business_name,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'pancard'       => strtoupper($request->pancard),
            'mobile'        => $mobile,
            'email'         => $email,
            'password'      => Hash::make($request->password),
        ]);

        session()->forget(['login_type', 'login_value']);

        return redirect()->route('loginoption')->with('success', 'Your account has been created successfully. Please login to continue.');
    }

    function continuewithemail(){
        return view('frontend.auth.continueemail');
    }

    function loginwithemail(Request $request){
        $request->validate([
            'email' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if($user->status == '0'){
                return redirect()->back()->with('error', 'Your account not active.Please contact to admin.');
            }else{
                session([
                    'login_value' => $request->email,
                    'login_type' => 'email'
                ]);
                //return redirect()->route('otp')->with('success', 'OTP sent to your mobile number');
            }
        } else {
            session([
                'login_value' => $request->email,
                'login_type' => 'email'
            ]);
            return redirect()->route('register')->with('error', 'Your email is not registered. Please register first.');
        }
    }

    function otp(){
        return view('frontend.auth.otp');
    }
}
