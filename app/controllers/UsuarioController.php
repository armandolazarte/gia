<?php

class UsuarioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return View::make('admin.usuarios.listar');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.usuarios.nuevo');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Crear Usuario
		$data = Input::all();

		$rules = array(
			'username' => 'required|numeric|min:7|unique:users',
			'password' => 'required|confirmed',
			'email' => 'required|email',
			'nombre' => 'required|alpha',
			'cargo' => 'alpha',
			'prefijo' => 'alpha|max:5',
			'iniciales' => 'alpha|max:5'
		);
		$validator = Validator::make($data, $rules);

		if ($validator->passes()) {
			/*$user = new User;
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Input::get('password');
			$user->nombre = Input::get('nombre');
			$user->cargo = Input::get('cargo');
			$user->prefijo = Input::get('prefijo');
			$user->iniciales = Input::get('iniciales');
			$user->save();*/

			//Asociar con Roles
			//$roles = Input::get('roles');

			return Redirect::action('UsuarioController@show', array('id', $user->id));
		} else {

			//Si no pasa la validación
			$errors = $validator->messages();
			return Redirect::action('UsuarioController@create')->withErrors($validator)->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		View::make('admin.usuarios.info', compact('user'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
