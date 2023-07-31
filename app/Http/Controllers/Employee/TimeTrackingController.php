<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\EmployeeTimeTracking;

class TimeTrackingController extends Controller
{
    public function index() {

        return view('employee.timetrackings.index');

    }

    public function create() {

        return view('employee.timetrackings.create');

    }

    public function store(Request $request) {

        $validator = Validator::make($request->all() ,[
            'date' => 'required',
            'number_of_hours' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        EmployeeTimeTracking::create([
            'employee_id' => Auth::guard('employee')->user()->id,
            'date' => date_format(date_create($request->date),"Y-m-d"),
            'number_of_hours' => $request->number_of_hours,
            'type' => $request->type,
            'description' => $request->description        
        ]);

        return redirect()->route('time-tracking.index');
    }

    public function edit(EmployeeTimeTracking $employeeTimeTracking) {

        return view('employee.timetrackings.edit', compact('employeeTimeTracking'));
    }
}
