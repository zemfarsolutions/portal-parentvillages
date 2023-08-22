<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intake;
use App\Models\IntakeAnswer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class IntakeController extends Controller
{
    public function index(){
        $user_id = Auth::guard('web')->user()->id;
        $total_records = Intake::where('user_id',$user_id)->count();
        return view('client.intakes.index',compact('total_records'));
    }

    public function create(){
        return view('client.intakes.create');
    }

    public function store(Request $request){
        $user_id = Auth::guard('web')->user()->id;
        
        $intake = Intake::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'gender' => $request->gender,
            'language' => $request->language,
            'age' => $request->age
        ]);

        // dd($intake->id);
        foreach ($request->toArray() as $key => $value) {

            if (strpos($key, 'question') !== false) {

                $question_id = filter_var($key, FILTER_SANITIZE_NUMBER_INT);

                if (gettype($value) == "array") {

                    for ($i = 0; $i < count($value); $i++) {

                        IntakeAnswer::create([
                            'intake_id' => $intake->id,
                            'question_id' => (int)$question_id,
                            'answer' => $value[$i]
                        ]);
                    }
                } else {

                    IntakeAnswer::create([
                        'intake_id' => $intake->id,
                        'question_id' => (int)$question_id,
                        'answer' => $value
                    ]);
                }
            }
        }

        return back()->with('success', 'Participant Intake form submitted successfully.');
    }

    public function view(Intake $intake){
        $records = Intake::where('id', $intake->id)
            ->with(['answers' => function ($query) {

                $query->with('question');
            }])
            ->first();

        return view('client.intakes.view', compact('intake'));
    }

    public function edit(Intake $intake){
       return view('client.intakes.edit', compact('intake'));
    }

    public function update(Request $request,$id){
        $user_id = Auth::guard('web')->user()->id;

        $intake = Intake::where('id',$id)
            ->update([
            'user_id' => $user_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'gender' => $request->gender,
            'language' => $request->language,
            'age' => $request->age
        ]);

        $delete_intake_ans = IntakeAnswer::where('intake_id',$id)->delete();
        if($delete_intake_ans){
            foreach ($request->toArray() as $key => $value) {

                if (strpos($key, 'question') !== false) {
    
                    $question_id = filter_var($key, FILTER_SANITIZE_NUMBER_INT);
    
                    if (gettype($value) == "array") {
    
                        for ($i = 0; $i < count($value); $i++) {
    
                            IntakeAnswer::create([
                                'intake_id' => $id,
                                'question_id' => (int)$question_id,
                                'answer' => $value[$i]
                            ]);
                        }
                    } else {
    
                        IntakeAnswer::create([
                            'intake_id' => $id,
                            'question_id' => (int)$question_id,
                            'answer' => $value
                        ]);
                    }
                }
            }
            return back()->with('success', 'Participant Intake form updated successfully.');
        }
        else{
            return back()->with('error', 'Fail to Update Participant Intake form.');
        }

    }
}
