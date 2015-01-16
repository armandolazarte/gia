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
		$roles = Role::all();
		return View::make('admin.usuarios.formUsuario', compact('roles'));
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
			'email' => 'required|email|unique:users',
			'nombre' => 'required|alpha_spaces',
			'cargo' => 'alpha_spaces',
			'prefijo' => 'alpha|max:5',
			'iniciales' => 'alpha|max:5'
		);
		$validator = Validator::make($data, $rules);

		if ($validator->passes()) {
			$user = new User;
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->nombre = Input::get('nombre');
			$user->cargo = Input::get('cargo');
			$user->prefijo = Input::get('prefijo');
			$user->iniciales = Input::get('iniciales');
			$user->save();

			//Asociar con Roles
			$role_user = Input::get('role_user');
			foreach($role_user as $role) {
				$user->roles()->attach($role);
			}

			return Redirect::action('UsuarioController@show', array($user->id));
		} else {
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
		return View::make('admin.usuarios.info', compact('user'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$roles = Role::all();

		return View::make('admin.usuarios.formUsuario')
			->with('user', $user)
			->with('roles', $roles);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();

		$rules = array(
			'username' => 'required|numeric|min:7|unique:users,username,'.$id,
			'password' => 'confirmed',
			'email' => 'required|email|unique:users,email,'.$id,
			'nombre' => 'required|alpha_spaces',
			'cargo' => 'alpha_spaces',
			'prefijo' => 'alpha|max:5',
			'iniciales' => 'alpha|max:5'
		);
		$validator = Validator::make($data, $rules);

		if ($validator->passes()) {
			$user = User::findOrFail($id);
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$psw = Input::has('password');
			if ( !empty($psw) ) {
				$user->password = Hash::make(Input::get('password'));
			}
			$user->nombre = Input::get('nombre');
			$user->cargo = Input::get('cargo');
			$user->prefijo = Input::get('prefijo');
			$user->iniciales = Input::get('iniciales');
			$user->save();

			//Asociar con Roles
			$role_user = Input::get('role_user');
			$user->roles()->sync($role_user);

			return Redirect::action('UsuarioController@show', array($user->id));
		} else {
			return Redirect::back()->withErrors($validator)->withInput();
		}
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
