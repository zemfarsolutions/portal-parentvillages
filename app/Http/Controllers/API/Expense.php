<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EmployeeExpense;
use Illuminate\Http\Request;

class Expense extends Controller
{
    public function index(Request $request)
    {

        $records = EmployeeExpense::where('employee_id', $request->id)->get();
        return $records;
    }
}