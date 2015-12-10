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

Route::get('/', function () {
    return view('welcome'); 
});

//Inicio route CRUD usuario
Route::group(['prefix'=>'Admin'], function(){
  
  Route::resource('Users', 'UsersController');
  
  Route::get('Users/{id}/destroy', [
    'uses' => 'UsersController@destroy',
    'as'=>'Admin.Users.destroy'
  ]);
  
  
  Route::resource('Clients', 'ClientsController');
  
  Route::get('Clients/{id}/destroy', [
    'uses' => 'ClientsController@destroy', 
    'as' => 'Admin.Clients.destroy'
    ]);
  
  Route::resource('Addemail', 'AddemailController');
  Route::get('Addemail/{id}/create', [
    'uses'=>'AddemailController@create',
    'as'  =>'Admin.Addemail.create'
  ]);  
  Route::get('Addemail/{id}/destroy', [
    'uses' => 'AddemailController@destroy',
    'as'=>'Admin.Addemail.destroy'
  ]);
  
  
  
});



























