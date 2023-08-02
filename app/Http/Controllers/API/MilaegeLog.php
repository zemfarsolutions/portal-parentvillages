<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EmployeeMilaegeLog;
use Illuminate\Http\Request;

class MilaegeLog extends Controller
{
    public function index(Request $request)
    {
        $records = EmployeeMilaegeLog::where('employee_id', $request->id)->get();

        return $records;
    }
}