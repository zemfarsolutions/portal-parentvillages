<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\UserApplication;
use App\Models\UserApplicationGuadian;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
{
    public function index(){
        $total_scholarships = Scholarship::all()->count();
        $records = Scholarship::all();
        return view('client.scholarships.index',compact('total_scholarships', 'records'));
    }

    public function view(Scholarship $scholarship)
    {
        return view('client.scholarships.view', compact('scholarship'));
    }

    public function create(Scholarship $scholarship){
        return view('client.scholarships.create',compact('scholarship'));
    }

    public function store(Request $request){
        
        $award_letter = 'sample';
        $transcript_letter = 'sample';
        $acceptance_letter = 'sample';

        $user_application = UserApplication::create([
            'user_id' => Auth::guard('web')->user()->id,
            'scholarship_id' => $request->scholarship_id,
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'address' => $request->address,
            'appartment' => $request->appartment,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'phone' => $request->phone,
            'award_letter' => $award_letter,
            // 'award_letter' => $request->phone,

            'transcript_letter' => $transcript_letter,
            // 'transcript_letter' => $request->phone,

            'high_school' => $request->high_school,
            'plan' => $request->plan,

            // 'acceptance_letter' => $request->phone,
            'acceptance_letter' => $acceptance_letter,
        ]);
       
        $guardians = [
            $request->guardian_one,
            $request->guardian_two
        ];
        
        for ($i=0; $i < count($guardians); $i++) { 

            UserApplicationGuadian::create([
                'user_application_id' => $user_application->id,
                'name' =>  $guardians[$i]["'name'"],
                'email' =>  $guardians[$i]["'email'"],
                'phone' =>  $guardians[$i]["'phone'"],
                'address' =>  $guardians[$i]["'address'"],
                'high_school_diploma' =>  isset($guardians[$i]["'high_school_diploma'"]) ?  true : false, 
                'associate_degree' =>  isset($guardians[$i]["'associate_degree'"]) ?  true : false,
                'bachelor_degree' =>  isset($guardians[$i]["'bachelor_degree'"]) ?  true : false,
                'master_degree' => isset($guardians[$i]["'master_degree'"]) ?  true : false, 
                'doctoral_degree' => isset($guardians[$i]["'doctoral_degree'"]) ?  true : false 
            ]);
        }
        
        dd($guardians);
        
        // $file_name = $request['award_letter']->getClientOriginalName();
        // $current_time = Carbon::now();
        // $formatted_date = $current_time->format('Y/m/d_H:i:s');
        // $applicant_name = str_replace(' ', '', $request['name']);

        // $formated_file = $formatted_date.'_'.$applicant_name.'_'.$file_name;
        // $file_path = $request['award_letter']->storeAs('uploads/client/award_letter', $formated_file, 'public');

        // $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

        // $keys = array_keys($guardians);
        // for($i = 0; $i < count($guardians); $i++) {
        //     foreach($guardians[$keys[$i]] as $key => $value) {
        //         UserApplicationGuadian::create([
        //             'user_id' => $user_id,
        //             'name' => 
        //         ]);
        //         echo $key . " : " . $value . "<br>";
        //     }
        // }



    }
}
