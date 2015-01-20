<?php

class AccionesController extends BaseController
{
    public function index()
    {
        $this->importar_rutas();

        $acciones = Accion::all();
        return View::make('admin.acciones.index')->with('acciones', $acciones);
    }

    public function importar_rutas()
    {
        //Consulta rutas registradas en tabla acciones
        $arr_rutas = Accion::lists('ruta');
        //Obiene rutas registradas
        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $route) {
            $ruta = $route->getPath();
            if ( array_search($ruta, $arr_rutas) === false) {
                //Si no se encuentra el valor de la ruta: Inserta ruta en acciones
                $accion = new Accion;
                $accion->ruta = $ruta;
                $accion->activo = false;
                $accion->save();

                //Agrega ruta nueva a arreglo para no duplicar rutas
                $arr_rutas[] = $ruta;
            }
        }
    }
}
