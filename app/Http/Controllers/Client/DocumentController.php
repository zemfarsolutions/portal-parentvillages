<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDocument;

class DocumentController extends Controller
{
    public function index(){
        $user_id = Auth::guard('web')->user()->id;
        $total_records = UserDocument::where('user_id',$user_id)->count();
        $total_documents = UserDocument::where('user_id',$user_id)->get();
        return view('client.documents.index',compact('total_records','total_documents'));
    }

    public function create(){
        return view('client.documents.create');
    }

    public function store(Request $userdocument){
        $current_time = Carbon::now();
        $formatted_date = $current_time->format('Y-m-d');
        $user_id = Auth::guard('web')->user()->id;
        $user_name = Auth::guard('web')->user()->name;
        $user_name_slug = str()->slug($user_name);

  
        $document_extension = $userdocument->file('document')->extension();
        $document_formated_file = $formatted_date.'-'.$user_name_slug.'.'.$document_extension;
        $document_store = $userdocument->file('document')->storeAs('User Documents', $document_formated_file, 'public');

        $document = UserDocument::create([
            'user_id' => $user_id,
            'path' => $document_store
        ]);
        return back()->with('success', 'Document submitted successfully.');

    }

    
}
