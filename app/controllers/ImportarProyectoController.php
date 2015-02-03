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

        $verifica_proy = Proyecto::whereProyecto($importador->proy)->get();

        $data['verifica_proy'] = $verifica_proy;
        $data['proyecto'] = $importador->proy;
        $data['d_proyecto'] = $importador->d_proyecto;
        $data['urg'] = $importador->urg;
        $data['d_urg'] = $importador->d_urg;
        $data['fondo'] = $importador->fondo;
        $data['d_fondo'] = $importador->d_fondo;
        $data['monto'] = $importador->monto_proy;
        $data['aaaa'] = $importador->aaaa;
        $data['inicio'] = $importador->inicio;
        $data['fin'] = $importador->fin;
        $data['partidas'] = $importador->arr_recursos;

        return View::make('admin.proyectos.importPreview')->with($data);
    }

    public function store(){
        $importador = new \Gia\Classes\ImportadorProyecto('/uploads/proyectos/temp.txt');
        $importador->extraer();



        $urg = Urg::whereUrg($importador->urg)->get(array('id'));
        $fondo = Fondo::whereFondo($importador->fondo)->get(array('id'));

        $arr_inicio = explode("/", $importador->inicio);
        $arr_fin = explode("/", $importador->fin);

        $proyecto = new Proyecto();
        $proyecto->proyecto = $importador->proy;
        $proyecto->d_proyecto = $importador->d_proyecto;
        $proyecto->monto = $importador->monto_proy;
        $proyecto->urg_id = $urg[0]->id;
        $proyecto->tipo_proyecto_id = 1;
        $proyecto->aaaa = $importador->aaaa;
        $proyecto->inicio = $arr_inicio[2]."-".$arr_inicio[1]."-".$arr_inicio[0];
        $proyecto->fin = $arr_fin[2]."-".$arr_fin[1]."-".$arr_fin[0];
        $proyecto->save();

        //Inserta datos @fondo_proyecto
        $proyecto->fondos()->attach($fondo[0]->id);

        $arr_objetivos = array();
        foreach($importador->arr_recursos as $partida => $val){
            //Buscar objetivo en key del arreglo
            $objetivo_id = array_search($val['objetivo'], $arr_objetivos);

            //Si no se encuentra
            if( empty($objetivo_id) ) {
                $objetivo = new Objetivo();
                $objetivo->objetivo = $val['objetivo'];
                $objetivo->d_objetivo = $val['d_objetivo'];
                $objetivo->save();
                $objetivo_id = $objetivo->id;
                $arr_objetivos[$objetivo->id] = $val['objetivo'];
            }

            $cog = Cog::whereCog($val['cog'])->get();
            $rm = new Rm();
            $rm->rm = $partida;
            $rm->proyecto_id = $proyecto->id;
            $rm->objetivo_id = $objetivo_id;
            $rm->actividad_id = 1;
            $rm->cog_id = $cog[0]->id;
            $rm->fondo_id = $fondo[0]->id;
            $rm->monto = $val['monto'];
            $rm->d_rm = "";
            $rm->save();
        }

        return Redirect::action('ProyectosController@index');
    }
}