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
            'event' => [],
            'place' => []
        ];
        $months = [];
        $data = [];
        $types = [];
        
        $records = EmployeeTimeTracking::select('type', 'date')
        ->where('employee_id',$request->id)
        ->get();

        for ($i=0; $i < count($records); $i++) { 
            
            $date = Carbon::createFromFormat('Y-m-d', $records[$i]->date);
            array_push($types, $records[$i]->type);

            if (!in_array($date->format('F'), $months)) {    

                array_push($months, $date->format('F'));
            }   

            // dd($records[$i]->type, $types, in_array($records[$i]->type, $types));

            if (in_array($date->format('F'), $months) && in_array($records[$i]->type, $types)) {    
                
                $getHours = EmployeeTimeTracking::where('type', $records[$i]->type)
                                                ->where('employee_id', $request->id)
                                                ->whereMonth('date', (int)$date->format('m'))
                                                ->sum('number_of_hours');
                
                if (!in_array($getHours, $total_hours[$records[$i]->type])) {
                    
                    array_push($total_hours[$records[$i]->type], $getHours);
                }
            }

            // array_push($data, $getHours);

        }

        // dd($total_hours, $months);
        // dd($total_hours, $months);
        // dd($num_of_hours);
        // foreach($records as $record){
                    
        //     $date = Carbon::createFromFormat('Y-m-d', $record->date);
            
        //     if (!in_array($date->format('F'), $months)) {    
        //         array_push($months, $date->format('F'));
        //     }

            
        //     foreach ($num_of_hours as $key => $value) { 

        //         if ($record->type == "place") {

        //             array_push($total_hours[$key], $value);

        //         }

        //         if ($record->type == "event") {

        //             array_push($total_hours[$key], $value);

        //         }

        //     }
        // } 


        $data['event_hours'] = $total_hours;
        $data['months'] = $months;
        // dd($data);

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
}
