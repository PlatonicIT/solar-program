<?php

use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('storage-link',function(){
    Artisan::call('storage:link');
});


Route::get('/', function () {
    return view('public.home');
});

Route::post('survey','SurveyController@received_survey')->name('survey');
Route::post('validate-zipcode','SurveyController@zipcode_validation')->name('zipcode.validation');
Route::post('validate-answer','SurveyController@answer_validation')->name('answer.validation');
Route::get('all','SurveyController@get_survey');
