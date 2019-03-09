<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function received_survey(Request $request){
       
        return $request->all();
    }
    public function zipcode_validation(Request $request){
        $request->validate([
            'zipcode'=>'required|digits:5|integer'
        ]);
        return response()->json(['status'=>'ok'],200);
    }
    public function answer_validation(Request $request){
        $request->validate([
            'text'=>'required',  
        ]);
        return $request->all(); 
    }
}
