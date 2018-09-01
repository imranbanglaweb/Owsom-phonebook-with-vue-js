<?php


// Route::get('/', function () {
//     return view('phonebook');
// });
// Route::get('/phonebook/{name}',function(){
// 	return redirect('/');
// })->where('name','[A-Za-z]+');

Route::resource('phonebook','PhonebookController');
Route::get('/','PhonebookController@index');
Route::post('getData','PhonebookController@GetData');
