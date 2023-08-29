<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EmployeeExpense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Expense extends Controller
{
    public function index(Request $request)
    {
        $records = EmployeeExpense::where('employee_id', $request->id)->get();
        return $records;
    }

    public function expense_chart(Request $request){
        $records = EmployeeExpense::where('employee_id', $request->id)->get();
        
        foreach($records as $record){
            $total_amount[] = $record->amount;
            $date = Carbon::createFromFormat('Y-m-d', $record->date);
            $months[] = $date->format('F');
        }
        $data ['total_amount']= $total_amount;
        $data['months']= $months;
        return $data;
    }
}