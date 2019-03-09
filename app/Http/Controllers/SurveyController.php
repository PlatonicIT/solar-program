<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
class SurveyController extends Controller
{
    public function received_survey(Request $request){
        return $request->all();
      
       $survey = new Survey();
       
       $survey->survey = $data;
       $survey->zipcode = $request->zipcode;
       $survey->save();
       return back();
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
    public function get_survey(){
       $survey = Survey::first();
      
       return view('welcome',compact('survey'));
    }
   
}
