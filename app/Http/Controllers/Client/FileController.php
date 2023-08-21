<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        return view('client.files.index');
    }

    public function create(){
        return view('client.files.create');
    }
}
