<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Validator;

use App\Models\{
    User,
    Employee,
    PasswordReset
};
use Illuminate\Support\Facades\DB;
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
        
        $data = [];

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

                array_push($data,$request->email);
                array_push($data,$token);
                
                return response()->json([
                    'status' => 200,
                    'message' => 'Email Found.',
                    'data' => $data,
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

    public function resetPassword(Request $request){

       $token = PasswordReset::where('token',$request->id)->get() ;
       
       if(isset($token)){
           return view('auth.reset_password',compact('request'));
        }
        else{
            return back();
        }
    }

    public function resetPasswordStore(Request $request){
      
        $validated = Validator::make($request->all(),[
            'password' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'password_confirmation' => 'required',
            ],
            [
                'password.regex' => 'Password Must Containe One Upercase alphabet letter, One Small alphabet letter , One Special character , atlest 8 characters long',
            ]
        );
        if ($validated->fails()) {
            return back()
            ->withErrors($validated)
            ->withInput();
        }

        $password_reset=PasswordReset::where('token',$request->forgotton_token)->first();
        
        // dd($password_reset);
        User::where('email',$password_reset->email)->update([
            'password' => Hash::make($request->password)
        ]);
        $delete_token = DB::table('password_resets')->where('token',$request->forgotton_token)->delete();
        // $password_reset->delete();

        return redirect()->route('login')->with('success','Password has been reset please login');

    }
}
