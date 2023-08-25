<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        return view('client.files.index');
    }

    public function create(){
        return view('client.files.create');

    }

    
}
