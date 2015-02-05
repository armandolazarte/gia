<?php

class Proyecto extends Eloquent
{
    //Proyecto __belongs_to__ Urg
    public function urg()
    {
        return $this->belongsTo('Urg');
    }
    
    //Proyecto __belongs_to__ TipoProyecto
    public function tipoProyecto()
    {
        return $this->belongsTo('TipoProyecto');
    }
    
    //Proyecto __has_many__ Rm
    public function rms()
    {
        return $this->hasMany('Rm');
    }

    //Proyecto __has_many__ Req
    public function reqs()
    {
        return $this->hasMany('Req');
    }

    //Proyecto __has_many__ Solicitud
    public function solicitudes()
    {
        return $this->hasMany('Solicitud');
    }
    
    //Proyecto __has_many__ Vale
    public function vales()
    {
        return $this->hasMany('Vale');
    }
    
    //Proyecto __belongs_to_many Fondos
    public function fondos()
    {
        return $this->belongsToMany('Fondo');
    }
    
    //Proyecto __belongs_to_many Cuentas
    public function cuentas()
    {
        return $this->belongsToMany('Cuenta');
    }
    
    //Proyecto __belongs_to_many Disponibles
    public function disponibles()
    {
        return $this->belongsToMany('Disponible')
                    ->withPivot('monto','no_invoice');
    }

    //Proyecto __morph_many__ Acceso
    public function accesos()
    {
        return $this->morphMany('Acceso', 'acceso');
    }

    public function scopeAcceso($query, $user_id)
    {
        if(!empty($user_id)) {
            $arr_tipos_proyecto = array();
            $arr_urgs = array();
            $arr_proyectos = array();

            $accesos = Acceso::whereUserId($user_id)->get();

            foreach ($accesos as $acceso) {
                if ($acceso->acceso_type == 'TipoProyecto') {
                    $arr_tipos_proyecto[] = $acceso->acceso_id;
                }
                if ($acceso->acceso_type == 'Urg') {
                    $arr_urgs[] = $acceso->acceso_id;
                }
                if ($acceso->acceso_type == 'Proyecto') {
                    $arr_proyectos[] = $acceso->acceso_id;
                }
            }

            if (count($arr_tipos_proyecto) > 0) {
                $query->whereIn('tipo_proyecto_id', $arr_tipos_proyecto);
            }
            if (count($arr_urgs) > 0) {
                $query->whereIn('urg_id', $arr_urgs);
            }
            if (count($arr_proyectos) > 0) {
                $query->whereIn('id', $arr_proyectos);
            }
        } else {
            $query->whereId(0);
        }
        return $query;
    }
}
