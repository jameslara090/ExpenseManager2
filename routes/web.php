<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('invoice', function(){
 //   return view('invoice');
//});

//Route::get('{path}','HomeController@index')->where( 'path', '([A-z\d-/_.]+)?' );

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/users', 'HomeController@users')->name('users');
//Route::get('/ExC', 'HomeController@Exc')->name('exc');
//Route::get('/expenses', 'HomeController@Expenses')->name('expenses');
//Route::get('/roles', 'HomeController@roles')->name('roles');

Route::resource('/users', 'UsersControllers');
Route::resource('/contacts', 'ContactController');
Route::resource('/expensesCategory', 'ExCController');
Route::resource('/expenses', 'expensesController');
Route::get('/home', 'HighchartController@handleChart');

