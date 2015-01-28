<?php

class ProyectosController extends BaseController
{
    public function index(){

        $proyectos = Proyecto::with('urg')->with('tipoProyecto')->get();
        return View::make('admin.proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        //Formulario para crear proyectos de forma manual
    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}