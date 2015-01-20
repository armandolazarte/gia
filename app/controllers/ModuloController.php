<?php

class ModuloController extends BaseController
{
    public function index()
    {
        $modulos = Modulo::with('roles')->get();
        $data['modulos'] = $modulos;
        return View::make('adminRoot.modulos.index', $data);
    }

    public function create(){
        $roles = Role::all();
        return View::make('adminRoot.modulos.formModulo', compact('roles'));
    }

    public function store(){
        $modulo = new Modulo;
        $modulo->ruta = Input::get('ruta');
        $modulo->nombre = Input::get('nombre');
        $modulo->icono = Input::get('icono');
        $modulo->orden = Input::get('orden');
        $modulo->activo = Input::get('activo');
        $modulo->save();

        //Asociar con Roles
        if( count(Input::get('modulo_role')) > 0 ){
            $modulo_role = Input::get('modulo_role');
            $modulo->roles()->sync($modulo_role);
        }

        return Redirect::action('ModuloController@index');
    }

    public function show(){

    }

    public function edit($id){
        $modulo = Modulo::find($id);
        $roles = Role::all();

        return View::make('adminRoot.modulos.formModulo')
            ->with('modulo', $modulo)
            ->with('roles', $roles);
    }

    public function update($id){
        $modulo = Modulo::findOrFail($id);
        $modulo->ruta = Input::get('ruta');
        $modulo->nombre = Input::get('nombre');
        $modulo->icono = Input::get('icono');
        $modulo->orden = Input::get('orden');
        $modulo->activo = Input::get('activo');
        $modulo->save();

        //Asociar con Roles
        if( count(Input::get('modulo_role')) > 0 ){
            $modulo_role = Input::get('modulo_role');
            $modulo->roles()->sync($modulo_role);
        }

        return Redirect::action('ModuloController@index');
    }

    public function destroy(){

    }
}
