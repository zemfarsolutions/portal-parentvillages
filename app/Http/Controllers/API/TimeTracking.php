<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeTimeTracking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TimeTracking extends Controller
{
    public function index(Request $request) {

        $records = EmployeeTimeTracking::where('employee_id', $request->id)->get();

        return $records;
    }

    public function time_track_chart(Request $request){
        $records = EmployeeTimeTracking::where('employee_id', $request->id)->get();

        $total_hours = [
            'event' => 0,
            'place' => 0
        ];
        $months = [];
        $data = [];
        
        $sdate =[];
        $example = [];
        $types = [];
$sum = 0;
        foreach($records as $record){
            
            $date = Carbon::createFromFormat('Y-m-d', $record->date);
            
            if (!in_array($date->format('F'), $months)) {    
                array_push($months, $date->format('F'));
            }

            $num_of_hours = EmployeeTimeTracking::select('number_of_hours', 'type','date')
                            ->where('employee_id',$request->id)
                            ->get()
                            ->toArray();
            
            foreach($num_of_hours as $key => $val){
                $sedate = Carbon::createFromFormat('Y-m-d', $val['date']);

                if (in_array($sedate->format('F'), $months) && $record->type == $num_of_hours[$key]['type']) {  
                    if($num_of_hours[$key]['type'] == 'event'){
                        $sum += $num_of_hours[$key]['number_of_hours'];
                    }
                   
                }
                echo $num_of_hours[$key]['number_of_hours']."<br>";
            }
            // foreach ($num_of_hours as $key => $value) { 
            //     if ($record->type == $key) {

            //         $total_hours[$key] += $value;

            //     }

            // }
            // dd($num_of_hours);
        }  
        $exam = ['July'=>['event' => '45' , 'place' => '85']];  
dd($sum);
        // $data['event_hours'] = $total_hours;
        // $data['months'] = $months;

        // return response()->json([
        //     'status' => 200,
        //     'data' => $data
        // ]);
    }
}
