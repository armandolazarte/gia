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
}
