<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntakeController extends Controller
{
    public function index(){
        return view('client.intake_form.view_intake_form');
    }

    public function view_intake_form(){
        return view('client.intake_form.create_intake_form');
    }
}
