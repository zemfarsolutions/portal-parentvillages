<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Mail; 


use App\Models\{
    User,
    Employee,
    PasswordReset
};
use Illuminate\Support\Facades\Mail as FacadesMail;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function store(Request $request) {
        
        $attributes = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($attributes);
        
        return response()->json([
            'status' => 200,
            'message' => 'You are registered successfully.'
        ]);
    }

    public function check(Request $request) {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if ($request->type == "client") {
            
            if (Auth::guard('web')->attempt($credentials)) {

                $request->session()->regenerate();
     
                return response()->json([
                    'status' => 200,
                    'type' => 'client',
                    'message' => 'You are logged In successfully.'
                ]);
            }
        }

        if ($request->type == "employee") {
            
            if (Auth::guard('employee')->attempt($credentials)) {

                $request->session()->regenerate();
     
                return response()->json([
                    'status' => 200,
                    'type' => 'employee',
                    'message' => 'You are logged In successfully.'
                ]);
            }
        }

        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong please try again.'
        ]);

    }

    public function destroyClient() {
        
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    public function destroyEmployee() {

        Auth::guard('employee')->logout();
        return redirect()->route('login');
    }

    public function forgetPassword(Request $request){
        
        if($request->type == "client"){
            $token = Str::random(64);
          
            $email_verification = User::where('email',$request->email)->first();
            if($email_verification){
                
                $attributes = [
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ];
                PasswordReset::create($attributes);
                return response()->json([
                    'status' => 200,
                    'message' => 'Email Found.'
                ]);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Email Not Found.'
                ]);
            }         
            return response()->json([
                'status' => 500,
                'message' => 'Internal Server Error.'
            ]);
           
        }   
        if($request->type == "employee"){
            $token = Str::random(64);

        }

        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong please try again.'
        ]);
    }

    public function resetPassword(){
        return view('auth.reset_password');
    }
}
