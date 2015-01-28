<?php

class ImportarProyectoController extends BaseController
{
    public function index(){
        $files = File::files('uploads/proyectos');
        return View::make('admin.proyectos.import', compact('files'));
    }

    public function postUpload(){
        //$input = Input::all();
        //Agregar validaciones
        $destinationPath = 'uploads/proyectos';
        $filename = Input::file('file')->getClientOriginalName();
        Input::file('file')->move($destinationPath, $filename);
        //return Redirect::action('FilesController@index');
    }

    public function convertir(){
        $fileName = Input::get('fileName');
        $importador = new \Gia\Classes\ImportadorProyecto($fileName);
        $importador->convertir();
        return Redirect::action('ImportarProyectoController@show');
    }

    public function show(){
        //$fileName = '\uploads\proyectos\temp.txt'; //Windows
        $fileName = '/uploads/proyectos/temp.txt';
        $importador = new \Gia\Classes\ImportadorProyecto($fileName);
        $importador->extraer();

        /**
         * @todo Verificar existencia de todos los campos
         */

        $data['proyecto'] = $importador->proy;
        $data['nombre'] = $importador->nombre;
        $data['urg'] = $importador->urg;
        $data['d_urg'] = $importador->d_urg;
        $data['fondo'] = $importador->fondo;
        $data['monto'] = $importador->monto_proy;
        $data['partidas'] = $importador->arr_recursos;

        return View::make('admin.proyectos.importPreview')->with($data);
    }

    public function store(){
        $importador = new \Gia\Classes\ImportadorProyecto('/uploads/proyectos/temp.txt');
        $importador->extraer();
        $proyecto = new Proyecto();
        $proyecto->proyecto = $importador->proy;

        //$proyecto->save();
        return \Illuminate\Support\Facades\Redirect::action('ProyectosController@show', $proyecto->proyecto);
    }
}