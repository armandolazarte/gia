<?php

class Urg extends Eloquent
{
    //Urg __has_many__ Proyecto
    public function proyectos()
    {
        return $this->hasMany('Proyecto');
    }
    
    //Urg __has_many__ Cuenta
    public function cuentas()
    {
        return $this->hasMany('Cuenta');
    }
    
    //Urg __has_many__ Alta
    public function altas()
    {
        return $this->hasMany('Alta');
    }
    
    //Urg __has_many__ Solicitud
    public function solicitudes()
    {
        return $this->hasMany('Solicitud');
    }
    
    //Urg __has_many__ Req
    public function reqs()
    {
        return $this->hasMany('Req');
    }

    //Urg __belongs_to_many__ Cargo
    public function cargos()
    {
        return $this->belongsToMany('Cargo');
    }

    //Urg __morph_many__ Acceso
    public function accesos()
    {
        return $this->morphMany('Acceso', 'acceso');
    }
}
