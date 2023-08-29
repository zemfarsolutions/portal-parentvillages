<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('client.profile.change_password');
    }

    public function store(Request $request){
        dd($request);
    }
}
