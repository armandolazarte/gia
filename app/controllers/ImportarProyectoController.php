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
        $data['d_proyecto'] = $importador->d_proyecto;
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

        $urg = Urg::whereUrg($importador->urg)-get();
        $tipo_proyecto = TipoProyecto::whereTipoProyecto('P3E-LGCG')->get();
        $fondo = Fondo::whereDFondo($importador->fondo)->get();

        $proyecto = new Proyecto();
        $proyecto->proyecto = $importador->proy;
        $proyecto->d_proyecto = $importador->d_proyecto;
        $proyecto->monto = $importador->monto_proy;
        $proyecto->urg_id = $urg[0]->id;
        $proyecto->tipo_proyecto_id = $tipo_proyecto[0]->id;
        //@todo Determinar año
        //@todo Insertar datos @fondo_proyecto
        $proyecto->save();

        //@todo Insertar objetivos
        //@todo Insertar actividades
        //@todo Exraer d_rm

        foreach($importador->arr_recursos as $partida => $val){
            $cog = Cog::whereCog($val['cog'])->get();
            $rm = new Rm();
            $rm->rm = $partida;
            $rm->proyecto_id = $proyecto->id;
            $rm->cog_id = $cog[0]->id;
            $rm->fondo_id = $fondo[0]->id;
            $rm->monto = $val['monto'];
            $rm->d_rm = "";
            $rm->save();
        }

        return \Illuminate\Support\Facades\Redirect::action('ProyectosController@show', $proyecto->proyecto);
    }
}