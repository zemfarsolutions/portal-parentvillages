<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeTimeTracking;
use Illuminate\Support\Facades\Auth;

class TimeTracking extends Controller
{
    public function index(Request $request) {

        $records = EmployeeTimeTracking::where('employee_id', $request->id)->get();

        return $records;
    }
}
