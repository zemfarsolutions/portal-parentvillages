<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\UserApplication;
use Illuminate\Http\Request;

class ScholarshipApplicationController extends Controller
{
    public function index(){
        $total_applicants = UserApplication::all()->count();

        $records = UserApplication::all();
        
        return view('client.applied_scholarships.index', compact('total_applicants', 'records'));
    }

    public function show(UserApplication $userapplication){
        return view('client.applied_scholarships.view', compact('userapplication'));
    }

    public function acceptStatus(UserApplication $userApplication){
        $userApplication->update([
            'status' => 'accept'
        ]);
        return back()->with('success','Application has been accepted');
    }
    public function rejectStatus(UserApplication $userApplication){
        $userApplication->update([
            'status' => 'reject'
        ]);
        return back()->with('success','Application has been rejected');
    }
}
