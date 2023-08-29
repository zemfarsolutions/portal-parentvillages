<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EmployeeMilaegeLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MilaegeLog extends Controller
{
    public function index(Request $request)
    {
        $records = EmployeeMilaegeLog::where('employee_id', $request->id)->get();
        return $records;
    }

    public function milage_chart(Request $request){

        $records = EmployeeMilaegeLog::where('employee_id', $request->id)->get();
        
        foreach($records as $record){

            $num_of_hours[] = $record->number_of_hours;
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $record->created_at);
            $months[] = $date->format('F');
            
        }

        $data ['values']= $num_of_hours;
        $data['months']= $months;

        dd($data);
        return $data;
    }
}