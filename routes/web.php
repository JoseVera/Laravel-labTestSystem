<?php
use Illuminate\Support\Facades\Input;
use App\Mail\reportMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/', function () {
    return view('welcome');
});



Route::get('test', 'TestController@index');
Route::get('test/create', 'TestController@create');
Route::post('test/create', 'TestController@store');
Route::get('test/detail/{id}', 'TestController@show');
Route::get('test/{id}', 'TestController@edit');
Route::post('test/{id}', 'TestController@update');
Route::get('test/destroy/{id}', 'TestController@destroy');


Route::get('report', 'ReportController@index');
Route::get('report/create', 'ReportController@create');
Route::post('report/create', 'ReportController@store');
Route::get('report/detail/{id}', 'ReportController@show');
Route::get('report/{id}', 'ReportController@edit');
Route::post('report/{id}', 'ReportController@update');
Route::get('report/destroy/{id}', 'ReportController@destroy');
Route::get('report/userDropDownData/{id}', 'ReportController@userDropDownData');
Route::get('reportPacient', 'ReportController@indexPacient');
Route::get('reportPacient/detail/{id}', 'ReportController@showPacient');
Route::get('pdfview/{id}',array('as'=>'pdfview','uses'=>'ReportController@pdfview'));

Route::get('emailReport/{path}', function () {
    
    Mail::to('3ac3e06acd-5fbc8f@inbox.mailtrap.io')->send(new reportMail);

    return view('sendReport');
});



Route::get('patient', 'PatientController@index');
Route::get('patient/create', 'PatientController@create');
Route::post('patient/create', 'PatientController@store');
Route::get('patient/detail/{id}', 'PatientController@show');
Route::get('patient/{id}', 'PatientController@edit');
Route::post('patient/{id}', 'PatientController@update');
Route::get('patient/destroy/{id}', 'PatientController@destroy');
Route::get('patient/userDropDownData/{id}', 'PatientController@userDropDownData');





