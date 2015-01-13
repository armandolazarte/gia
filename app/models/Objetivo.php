<?php

class Objetivo extends Eloquent
{
    public $timestamps = false;
    
    //Objetivo __has_many__ Rm
    public function rms()
    {
        return $this->hasMany('Rm');
    }
    
    //Objetivo __belongs_to_many__ Solicitud
    public function solicitudes()
    {
        return $this->belongsToMany('Solicitud')->withPivot('monto');
    }
    
    //Objetivo __belongs_to_many__ Vales
    public function vales()
    {
        return $this->belongsToMany('Vale')->withPivot('monto');
    }
}