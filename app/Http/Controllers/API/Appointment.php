<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Appointment extends Controller
{
    public function index(Request $request)
    {
        $records = "Model Here";        
        return $records;
    }
}
