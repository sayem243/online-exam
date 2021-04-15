<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','HomeController@index')->name('home');
Route::get('/test','QuestionController@index')->name('test');
Route::get('/start','QuestionController@start')->name('start');
Route::get('/end','QuestionController@endQuize')->name('endQuize');
Route::post('/add/question','QuestionController@add')->name('add-question');
Route::post('/update/question/{id}','QuestionController@update')->name('update-question');
Route::post('/delete/question/{id}','QuestionController@delete')->name('delete-question');
Route::get('/question','QuestionController@show')->name('show');
Route::post('/submit/answer','QuestionController@submitAnswer')->name('submit-answer');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


