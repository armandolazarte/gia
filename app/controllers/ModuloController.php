<?php

class ModuloController extends BaseController
{
    public function index()
    {
        $modulos = Modulo::all();
        $data['modulos'] = $modulos;
        return View::make('adminRoot.menu.index', $data);
    }

    public function create(){
        return View::make('adminRoot.menu.create');
    }

    public function store(){
        $modulo = new Modulo;
        $modulo->ruta = Input::get('ruta');
        $modulo->nombre = Input::get('nombre');
        $modulo->icono = Input::get('icono');
        $modulo->orden = Input::get('orden');
        $modulo->activo = Input::get('activo');
        $modulo->save();

        return Redirect::action('ModuloController@index');
    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
