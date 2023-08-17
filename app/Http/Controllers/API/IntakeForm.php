<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Intake;
use App\Models\IntakeAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntakeForm extends Controller
{
    public function index(Request $request)
    {
       
        $intakeform = Intake::where('user_id',$request->id)->get(); 
        // $records = EmployeeReceipt::with('images')->where('employee_id', $request->id)->get();
       
        return $intakeform;
    }

    public function getImages(Request $request)
    {
        
    }
}
