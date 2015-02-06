<?php

class ArticulosController extends BaseController
{
    public function create($req_id)
    {
        $req = Req::find($req_id);
        $unidades = Unidad::all();
        $data['req'] = $req;

        foreach($unidades as $unidad){
            $arr_unidades[$unidad->tipo][$unidad->unidad] = $unidad->unidad;
        }
        $data['unidades'] = $arr_unidades;

        return View::make('reqs.formArticulo')->with($data);
    }

    public function store()
    {
        $data = Input::all();
        $rules = array(
            'req_id' => 'required|numeric',
            'articulo' => 'required',
            'cantidad' => 'required|numeric',
            'unidad' => 'required'
        );

        $validator = Validator::make($data, $rules);
        if ($validator->passes())
        {
            $articulo = new Articulo();
            $articulo->req_id = Input::get('req_id');
            $articulo->articulo = Input::get('articulo');
            $articulo->cantidad = Input::get('cantidad');
            $articulo->unidad = Input::get('unidad');
            $articulo->save();

            return Redirect::action('RequisicionController@show', array(Input::get('req_id')));
        } else {
            return Redirect::action('ArticulosController@create', array(Input::get('req_id')))->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $articulo = Articulo::find($id);

        //Verifica que la requisición no esté terminada
        if ($articulo->req->estatus == '')
        {
            $unidades = Unidad::all();
            foreach($unidades as $unidad){
                $arr_unidades[$unidad->tipo][$unidad->unidad] = $unidad->unidad;
            }

            $data['articulo'] = $articulo;
            $data['req'] = $articulo->req;
            $data['unidades'] = $arr_unidades;

            return View::make('reqs.formArticulo')->with($data);
        } else {
            return Redirect::action('RequisicionController@show', array($articulo->req->id));
        }
    }

    public function update($id)
    {
        $data = Input::all();
        $rules = array(
            'articulo' => 'required',
            'cantidad' => 'required|numeric',
            'unidad' => 'required'
        );
        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            $articulo = Articulo::findOrFail($id);
            $articulo->articulo = Input::get('articulo');
            $articulo->cantidad = Input::get('cantidad');
            $articulo->unidad = Input::get('unidad');
            $articulo->save();

            return Redirect::action('RequisicionController@show', array($articulo->req->id));
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);
        $req_id = $articulo->req->id;
        $articulo->delete();
        return Redirect::action('RequisicionController@show', array($req_id));
    }
}