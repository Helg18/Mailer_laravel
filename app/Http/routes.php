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

//ruta de ejemplo para capturar datos por la url
//Route::get('cliente/{nombre?}', function($nombre = "No existe el cliente") {
//  echo "El cliente que estas intentando ver es: ".$nombre;
//});


    //ruta de ejemplo para llamar un controlador desde una ruta
    //Route::get('clientes/{id?}',[
    //'uses'  =>  'TestController@index',
    //'as'    =>  'ClientesInicio'
    //]);


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
  



});


//fin route CRUD usuario


























