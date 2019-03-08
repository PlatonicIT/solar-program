<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function received_survey(Request $request){
        $request->validate([
            'zipcode'=>'required|min:5|max:5'
        ]);
        return $request->all();
    }
    public function survey_validation(Request $request){
        $request->validate([
            'zipcode'=>'required|digits:5|integer'
        ]);
        return response()->json(['status'=>'ok'],200);

    }
}
