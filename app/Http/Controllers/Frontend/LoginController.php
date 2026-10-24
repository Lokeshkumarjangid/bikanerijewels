<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

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
        session()->forget(['login_value', 'login_type']);
        
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
            'gst_no'        => 'nullable',
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
                return redirect()->route('loginwithpassword')->with('success', 'Please enter your password first after login.');
            }
        } else {
            session([
                'login_value' => $request->email,
                'login_type' => 'email'
            ]);
            return redirect()->route('register')->with('error', 'Your email is not registered. Please register first.');
        }
    }

    function loginwithpassword(Request $request){
        return view('frontend.auth.loginwithpassword');
    }

    public function loginemail(Request $request)
    {
        $email = session('login_value');

        $credentials = [
            'email' => $email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->with('error', 'Invalid credentials');
    }

    function otp(){
        $mobile = session('login_value');
        return view('frontend.auth.otp', compact('mobile'));
    }

    public function logout(Request $request)
    {
        Auth::logout(); // user logout

        $request->session()->invalidate(); // session destroy
        $request->session()->regenerateToken(); // CSRF token reset

        return redirect('/'); // homepage pe wapas
    }

    public function profile(Request $request)
    {
        $data['profile'] = User::where('id', auth()->id())->first();

        return view('frontend.auth.profile', $data);
    }

    public function profileUpdate(){
        $user = Auth::user();
           $validated = $request->validate([
        'first_name' => ['required','string','max:100',],

            'last_name' => ['required','string','max:100',],

            'business_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'gst_no' => [
                'nullable',
                'string',
                'size:15',
                'regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z][A-Z0-9]Z[A-Z0-9]$/',
            ],

            'mobile' => [
                'required',
                'digits:10',
                Rule::unique('users', 'mobile')->ignore($user->id),
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'same:confirm_password',
            ],

            'confirm_password' => [
                'required_with:password',
                'nullable',
                'string',
            ],
        ], [
            'first_name.required' => 'First name is required.',
            'first_name.max' => 'First name cannot exceed 100 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.max' => 'Last name cannot exceed 100 characters.',

            'business_name.max' => 'Business name cannot exceed 255 characters.',

            'gst_no.size' => 'GST number must contain exactly 15 characters.',
            'gst_no.regex' => 'Please enter a valid GST number.',

            'mobile.required' => 'Mobile number is required.',
            'mobile.digits' => 'Mobile number must contain exactly 10 digits.',
            'mobile.unique' => 'This mobile number is already registered.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',

            'password.min' => 'Password must be at least 8 characters.',
            'password.same' => 'Password and confirm password do not match.',

            'confirm_password.required_with' => 'Please confirm your new password.',
        ]);

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->business_name = $validated['business_name'] ?? null;
        $user->gst_no = !empty($validated['gst_no'])
            ? strtoupper($validated['gst_no'])
            : null;
        $user->mobile = $validated['mobile'];
        $user->email = $validated['email'];

        // Update password only if a new password is entered.
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
