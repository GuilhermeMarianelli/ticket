<?php

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

Route::get('/','PagesController@welcome');

Route::get('/about','PagesController@about');

Route::get('/contact','TicketsController@create');
Route::post('/contact','TicketsController@store');
Route::get('/tickets','TicketsController@index');
Route::get('/ticket/{slug?}','TicketsController@show');
Route::get('/ticket/{slug}/edit','TicketsController@edit');
Route::post('/ticket/{slug}/edit','TicketsController@update');
Route::post('ticket/{slug}/delete','TicketsController@destroy');
Route::get('/sendmail',function(){
	$data = array(
		'name' => 'Learning Laravel'
	);
	Mail::send('emails.welcome',$data,function($message){
		$message->from('codigogmgs@gmail.com','Learning Laravel with Guilherme Marianelli');
		$message->to('gmarianelli@aol.com')->subject('Learning Laravel test email');
	});
	return "Your email has been sent successfully!";
});

Route::get('/foo',function(){
	return "Welcome to my website!";
});
Route::get('/method/{name?}',function ($name = null){
	return "Name ".$name;
});
Route::get('/post/{post}/comments/{comments?}',function($post,$comments = null){
	return $post." ".$comments;
});
Route::get('/expression/{name?}',function($name = null){
	return $name;
})->where('name','[A-Za-z]+');
Route::get('/user/{id?}',function($id = null){
	return $id;
});
