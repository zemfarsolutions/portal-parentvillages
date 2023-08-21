<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
        return view('client.appointments.index');
    }

    public function create(){
        return view('client.appointments.create');
    }
}
