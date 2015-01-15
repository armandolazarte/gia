<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'prueba'), function()
{
	Route::get('/menu', function()
	{
		return View::make('prueba.menu');
	});
});

Route::group(array('prefix' => 'admin'), function()
{
	Route::resource('usuario', 'UsuarioController');
});

Route::group(array('prefix' => 'adminRoot'), function()
{
	Route::get('/modulos', 'ModuloController@index');
	Route::get('/modulos/nuevo', 'ModuloController@create');
	Route::post('/modulos', 'ModuloController@store');
	Route::get('/modulos/{modulo}', 'ModuloController@show');//Por implementar
});

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);
