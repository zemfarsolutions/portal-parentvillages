<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserApplication;
use Auth;
use Illuminate\Http\Request;

class AppliedScholarships extends Controller
{
    public function index(Request $request) {
        $records = UserApplication::where('user_id', $request->id)->orderBy('id', 'DESC')->get();
        return $records;
    } 
}