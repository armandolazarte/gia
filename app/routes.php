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

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

Route::group(array('prefix' => 'prueba'), function()
{
	Route::get('/files', 'FilesController@index');
	Route::get('/upload', 'FilesController@getUpload');
	Route::post('/upload', 'FilesController@postUpload');

	Route::get('/menu', function()
	{
		return View::make('prueba.menu');
	});

	Route::get('/filtro', array('before' => 'auth|role', function()
	{
		return ('Rol valido');
	}));
});

Route::group(array('prefix' => 'admin'), function()
{
	Route::resource('usuario', 'UsuarioController');
	Route::get('/acciones', 'AccionesController@index');
	Route::get('/acciones/editar/{id}', 'AccionesController@editar');
	Route::post('/acciones/actualizar/{id}', 'AccionesController@actualizar');

	Route::get('/tiposProyectos/', 'TiposProyectosController@index');
	Route::get('/tiposProyectos/nuevo', 'TiposProyectosController@create');
	Route::post('/tiposProyectos/{tipoProyecto}', 'TiposProyectosController@store');
	Route::get('/tiposProyectos/editar/{tipoProyecto}', 'TiposProyectosController@edit');
	Route::post('/tiposProyectos/actualizar/{tipoProyecto}', 'TiposProyectosController@update');
});

Route::group(array('prefix' => 'adminRoot'), function()
{
	Route::get('/modulos', 'ModuloController@index');
	Route::get('/modulos/nuevo', 'ModuloController@create');
	Route::post('/modulos', 'ModuloController@store');
	Route::get('/modulos/editar/{modulo}', 'ModuloController@edit');
	Route::post('/modulos/{modulo}', 'ModuloController@update');
});
