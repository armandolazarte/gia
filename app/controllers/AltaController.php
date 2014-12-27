<?php

class AltaController extends BaseController
{
	public function info($id = null)
	{
		$data['altas'] = array();
		
		if ( empty($id)) {
			$this->importarDocsPendientes();
			
			$altas = Alta::all();
			if ( !$altas->isEmpty() ) {
				$data['altas'] = $altas;
			}
		} else {
			$alta = Alta::find($id);
			$altas[] = $alta;
			$data['alta'] = $alta;
		}
		
		return View::make('alta.info', $data);
	}
	
	public function formDebito ()
	{
    	$alta = Alta::findOrFail(Input::get('id'));
        $data['alta'] = $alta;
        
        return View::make('alta.formDebito', $data);
	}
	
	public function formDebitoProcesa ()
	{
		$alta = Alta::findOrFail(Input::get('id'));
		$alta->debito = Input::get('debito');
		$alta->estatus = "Debito";
		$alta->save();
		
		return Redirect::action('AltaController@info');
	}
	
	private function importarDocsPendientes ()
	{
	    //Importar OCs c/alta pendiente
	    $oc_importadas = Alta::where('tipo','=','oc')->lists('doc_id');
	    if ( count($oc_importadas) > 0 ) {
	        $oc_pendientes = DB::connection('sigi14')->table('tbl_req_art')
	                ->select('req', 'oc')
	                ->whereNotIn('oc', $oc_importadas)
	                ->where('alta', '=', '1')
	                ->distinct()
	                ->get();
	    } else {
	        $oc_pendientes = DB::connection('sigi14')->table('tbl_req_art')
	                ->select('req', 'oc')
	                ->where('alta', '=', '1')
	                ->distinct()
	                ->get();
	    }
	    
	    foreach ($oc_pendientes as $ocp)
	    {
	    	$sel_proy = DB::connection('sigi14')->table('tbl_req')
	    			->leftJoin('tbl_proyectos', 'tbl_req.proy', '=', 'tbl_proyectos.proy')
	    			->where('req', '=', $ocp->req)
	    			->get(array('ures'));
	    	$urg = Urg::whereUrg($sel_proy[0]->ures)->get(array('id'));
	    	
	        $alta = new Alta;
	        $alta->doc_id = $ocp->oc;
	        $alta->tipo = 'oc';
	        $alta->egreso_id = '';
	        $alta->urg_id = $urg[0]->id;
	        $alta->debito = '';
	        $alta->estatus = 'Pendiente';
	        $alta->save();
	    }
	    
	    //Importar OCs c/alta pendiente
	    $sol_importadas = Alta::where('tipo','=','sol')->lists('doc_id');
	    
	    if ( count($sol_importadas) > 0 ) {
	        $sol_pendientes = DB::connection('sigi14')->table('tbl_solicitud')
	                ->select('solicitud_id', 'proy')
	                ->whereNotIn('solicitud_id', $sol_importadas)
	                ->where('inventariable', '=', '1')
	                ->get();
	    } else {
	        $sol_pendientes = DB::connection('sigi14')->table('tbl_solicitud')
	                ->select('solicitud_id', 'proy')
	                ->where('inventariable', '=', '1')
	                ->get();
	    }
	    
	    foreach ($sol_pendientes as $sol)
	    {
	        $sel_proy = DB::connection('sigi14')->table('tbl_proyectos')
	    			->where('proy', '=', $sol->proy)
	    			->get(array('ures'));
	    	$urg = Urg::whereUrg($sel_proy[0]->ures)->get(array('id'));
	        
	        $alta = new Alta;
	        $alta->doc_id = $sol->solicitud_id;
	        $alta->tipo = 'sol';
	        $alta->egreso_id = '';
	        $alta->urg_id = $urg[0]->id;
	        $alta->debito = '';
	        $alta->estatus = 'Pendiente';
	        $alta->save();
	    }
    }
}
