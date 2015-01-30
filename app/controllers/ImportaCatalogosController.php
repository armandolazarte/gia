<?php

class ImportaCatalogosController extends BaseController
{
    public function index(){
        return View::make('adminRoot.formImportaCatalogos');
    }

    public function importar($catalogo){
        $importador = new \Gia\Classes\ImportadorCatalogos($db_orgien);

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

        \Redirect::action('ImportaCatalogosConroller@index');
    }
}