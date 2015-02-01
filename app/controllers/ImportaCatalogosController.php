<?php

class ImportaCatalogosController extends BaseController
{
    public function index(){
        return View::make('adminRoot.formImportaCatalogos');
    }

    public function importar(){
        $db_origen = Input::get('db_origen');
        $catalogo = Input::get('catalogo');
        $importador = new \Gia\Classes\ImportadorCatalogos($db_origen);

        if ($catalogo == "URG"){
            $importador->importarUrgs();
        }
        if ($catalogo == "Fondos"){
            $importador->importarFondos();
        }
        if ($catalogo == "Proyectos"){
            $importador->importarProyectos();
        }
        if ($catalogo == "Cuentas"){
            $importador->importarCuentas();
        }
        if ($catalogo == "Beneficiarios"){
            $importador->importarBenefs();
        }
        if ($catalogo == "COG"){
            $importador->importarCog();
        }

        return \Redirect::action('ImportaCatalogosController@index');
    }
}