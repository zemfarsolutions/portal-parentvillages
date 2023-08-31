<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::guard('web')->user();
        $name_split = Str::ucsplit(Auth::guard('web')->user()->name);
        return view('client.profile.index',compact('user','name_split'));
    }

    public function password_index(){
        $user = Auth::guard('web')->user();
        return view('client.profile.change_password',compact('user'));
    }
    public function show(){
        dd('Ehmm');
    }
    public function store(Request $request){
        
        $validated = Validator::make($request->all(),[
            'current_password' => 'required',
            'password' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'password_confirmation' => 'required',
        ],
        [
            'password.regex' => 'Password Must Containe One Upercase alphabet letter, One Small alphabet letter , One Special character , atlest 8 characters long',
        ]
    );

        $login_password = Auth::guard('web')->user()->password;
        $user_id = Auth::guard('web')->user()->id;
    
        if (! Hash::check($request->current_password, $login_password) && $validated->fails()) {
            return back()
            ->withErrors($validated)
            ->withInput();
        }

        $user_password = User::find($user_id);
 
        $user_password->password = Hash::make($request->password);
        
        $user_password->save();
        
        return back()->with('success', 'Password change successfully.');
        
    }
}
