<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('home', 'QuestionsController@index');
Route::post('ask', 'QuestionsController@store');
Route::get('question/{id}', array('as'=>'question','uses'=>'QuestionsController@show'));
 Route::post('answer', 'AnswersController@store');
 
 Route::get('your-ques', 'QuestionsController@your_ques');
 
Route::get('your-ques/{id}/edit', array('as'=>'your-ques','uses'=>'QuestionsController@edit'));

Route::PATCH('your-ques/{id}', 'QuestionsController@update');

 Route::post('question/search', 'QuestionsController@search');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
