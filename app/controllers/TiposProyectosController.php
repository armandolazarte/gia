<?php
/**
 * Created by PhpStorm.
 * User: Samuel Mercado
 * Date: 22/01/2015
 * Time: 04:36 PM
 */

class TiposProyectosController extends BaseController
{
    public function index()
    {
        $tiposProyecto = TipoProyecto::all();
        return View::make('admin.tiposProy.index', compact('tiposProyecto'));
    }

    public function create(){
        return View::make('admin.tiposProy.formTipoProy');
    }

    public function store(){
        $tipoProyecto = new TipoProyecto;
        $tipoProyecto->tipo_proyecto = Input::get('tipo_proyecto');
        $tipoProyecto->save();

        return Redirect::action('TiposProyectosController@index');
    }

    public function show(){
        //Consultar proyectos relacionados con el tipo de proyecto
    }

    public function edit($id){
        $tipoProyecto = TipoProyecto::find($id);
        return View::make('admin.tiposProy.formTipoProy', compact('tipoProyecto'));
    }

    public function update($id){
        $tipoProyecto = TipoProyecto::findOrFail($id);
        $tipoProyecto->tipo_proyecto = Input::get('tipo_proyecto');
        $tipoProyecto->save();

        return Redirect::action('TiposProyectosController@index');
    }

    public function destroy(){

    }
}