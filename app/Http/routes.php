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
Route::group(['prefix'=>'Admin', 'middleware' => 'auth'], function(){
  

  
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
  
  Route::resource('Sender', 'SenderController');
  Route::get('Admin.Sender.listarcorreos', [
    'uses' => 'SenderController@listarcorreos',
    'as'   => 'Admin.Sender.listarcorreos'
  ]);
  
});


// Authentication routes...
Route::get('Admin/Auth/login', [
  'uses' => 'Auth\AuthController@getLogin',
  'as'   => 'Admin.Auth.login'
]);
Route::post('Admin/Auth/login', [
  'uses' => 'Auth\AuthController@postLogin',
  'as'   => 'Admin.Auth.login'
]);
Route::get('Admin/Auth/logout', [
  'uses' => 'Auth\AuthController@getLogout',
  'as'   => 'Admin.Auth.logout'
]);

























