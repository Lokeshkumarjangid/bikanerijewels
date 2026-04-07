<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'business_name' => $request->business_name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gst_no' => $request->gst_no,
                'pancard' => $request->pancard,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User registered successfully',
                'data' => $user
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    public function login(LoginRequest $request){
        try {
            if(!empty($request->email) || !empty($request->mobile)){
                $user = User::when($request->email, function ($query) use ($request) {
                            return $query->where('email', $request->email);
                        })
                        ->when($request->mobile, function ($query) use ($request) {
                            return $query->where('mobile', $request->mobile);
                        })
                        ->first();
                if(!empty($user)){
                    if($user->status == 1){
                        if (!Hash::check($request->password, $user->password)) {
                            return response()->json([
                                'status' => false,
                                'message' => 'Invalid password'
                            ], 401);
                        }
                        $token = $user->createToken('auth_token')->plainTextToken;
                        return response()->json([
                            'status' => true,
                            'message' => 'Login successfully',
                            'token' => $token,
                            'data' => $user
                        ], 200);
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'Account inactive'
                        ], 404);
                    }
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'User not found'
                    ], 404);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Email and mobile number either one is required',
                ], 422);
            }
        } catch (\Exception $e) {
            dd($e);
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
    }
}