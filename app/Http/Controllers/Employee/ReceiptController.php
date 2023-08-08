<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeReceipt;
use App\Models\EmployeeReceiptImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReceiptController extends Controller
{
    public function index()
    {
        $images = EmployeeReceiptImage::where('employee_receipt_id', 1)->get();

        return view('employee.receipts.index', compact('images'));
    }

    public function create()
    {
        return view('employee.receipts.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'place' => 'required',
            'amount' => 'required',
            'receipt' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $employee_receipt = EmployeeReceipt::create([
            'employee_id' => Auth::guard('employee')->user()->id,
            'date' => date_format(date_create($request->date), "Y-m-d"),
            'place' => $request->place,
            'amount' => $request->amount
        ]);

        if ($request->hasFile('receipt')) {

            for ($i = 0; $i < count($request->receipt); $i++) {

                $path = $request->file('receipt')[$i]->store('receipts');

                EmployeeReceiptImage::create([
                    'employee_receipt_id' => $employee_receipt->id,
                    'path' => $path
                ]);
            }
        }

        return redirect()->route('receipts.index')->with('success', 'Receipt created successfully.');
    }

    public function edit(EmployeeReceipt $receipt)
    {
        return view('employee.receipts.edit', compact('receipt'));
    }

    public function update(EmployeeReceipt $receipt, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'place' => 'required',
            'amount' => 'required',
            'receipt' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $receipt->update([
            'date' => date_format(date_create($request->date), "Y-m-d"),
            'place' => $request->place,
            'amount' => $request->amount
        ]);

        if ($request->hasFile('receipt')) {

            $receipt->images()->delete();

            for ($i = 0; $i < count($request->receipt); $i++) {

                $path = $request->file('receipt')[$i]->store('receipts');

                $receipt->images()->create([
                    'path' => $path
                ]);
            }
        }

        return redirect()->route('receipts.index')->with('success', 'Receipt updated successfully.');
    }

    public function delete(EmployeeReceipt $receipt)
    {
        $receipt->images()->delete();
        $receipt->delete();

        return back()->with('error', 'Receipt deleted successfully.');
    }
}
