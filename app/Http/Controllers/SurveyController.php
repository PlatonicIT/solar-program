<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Survey;
class SurveyController extends Controller
{
    public function received_survey(Request $request)
    {
//        return $request->all();
        $survey = new Survey();
        $survey->survey = $request->answer;
        $survey->zipcode = $request->zipcode;
        $survey->save();
        
        return back()->with('success','Thanks for Your Participation');
//        return response()->json($survey->toArray());
    }
    public function zipcode_validation(Request $request)
    {
        $request->validate([
            'zipcode' => 'required|digits:5|integer'
        ]);
        return response()->json(['status' => 'ok'], 200);
    }
 
}