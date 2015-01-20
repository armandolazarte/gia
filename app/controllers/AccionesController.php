<?php

class AccionesController extends BaseController
{
    public function index()
    {
        $this->importar_rutas();

        $acciones = Accion::with('modulos')->get();
        //dd($acciones[10]->modulos[0]->nombre);

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

    public function editar($id)
    {
        $accion = Accion::find($id);
        $modulos = Modulo::all();

        return View::make('admin.acciones.editar')
            ->with('accion', $accion)
            ->with('modulos', $modulos);
    }

    public function actualizar($id)
    {
        $accion = Accion::findOrFail($id);
        $accion->nombre = Input::get('nombre');
        $accion->icono = Input::get('icono');
        $accion->orden = Input::get('orden');
        $accion->activo = Input::get('activo');
        $accion->save();

        if ( count(Input::get('accion_modulo')) > 0) {
            $accion_modulo = Input::get('accion_modulo');
            $accion->modulos()->sync($accion_modulo);
        }

        return Redirect::action('AccionesController@index');
    }
}
