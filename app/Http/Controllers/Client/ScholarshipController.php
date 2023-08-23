<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scholarship;


class ScholarshipController extends Controller
{
    public function index(){
        $total_scholarships = Scholarship::all()->count();
        $records = Scholarship::all();
        return view('client.scholarships.index',compact('total_scholarships', 'records'));
    }

    public function view(Scholarship $scholarship)
    {
        return view('client.scholarships.view', compact('scholarship'));
    }

    public function create(){
        
        return view('client.scholarships.create');
    }
}
