<?php

class RequisicionController extends BaseController
{
    public function index()
    {
        $reqs = Req::whereSolicita(Auth::user()->id)->get();
        $reqs->load('urg');
        return View::make('reqs.indexReq', compact('reqs'));
    }

    public function create()
    {
        $urgs = Urg::all(array('id','urg','d_urg'));
        $arr_proyectos = FiltroAcceso::getArrProyectos();
        return View::make('reqs.formRequisicion')
            ->with('urgs', $urgs)
            ->with('proyectos', $arr_proyectos);
    }

    public function store()
    {
        $data = Input::all();

        $rules = array(
            'urg_id' => 'required|numeric',
            'proyecto_id' => 'required|numeric',
            'etiqueta' => 'required|alpha_spaces',
            'lugar_entrega' => 'required'
        );
        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            $req = new Req();
            $req->req = Consecutivo::nextReq();
            $req->fecha_req = Carbon\Carbon::now()->toDateString();
            $req->urg_id = Input::get('urg_id');
            $req->proyecto_id = Input::get('proyecto_id');
            $req->etiqueta = Input::get('etiqueta');
            $req->lugar_entrega = Input::get('lugar_entrega');
            $req->obs = Input::get('obs');
            $req->solicita = Auth::user()->id;
            //@todo Implementar determinación de quien autoriza
            //$req->autoriza = ;
            //$req->vobo = ;
            $req->estatus = "";
            $req->tipo_orden = "Compra";
            $req->save();

            return Redirect::action('RequisicionController@show', array($req->id));
        } else {
            return Redirect::action('RequisicionController@create')->withErrors($validator)->withInput();
        }
    }

    public function show($id)
    {
        $req = Req::find($id);
        $articulos = Articulo::whereReqId($id)->get();
        $data['req'] = $req;
        if (isset($articulos)) {
            $data['articulos'] = $articulos;
        } else {
            $data['articulos'] = array();
        }
        return View::make('reqs.infoRequisicion')->with($data);
    }

    public function edit($id){

    }

    public function update($id){

    }
}