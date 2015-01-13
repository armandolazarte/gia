<?php

class Cuadro extends Eloquent
{
    use SoftDeletingTrait;
    
    //Cuadro __belongs_to__ Req
    public function req()
    {
        return $this->belongsTo('Req');
    }
    
    //Cuadro __belongs_to_many__ Cotizacion
    public function cotizaciones()
    {
        return $this->belongsToMany('Cotizacion')->withPivot('criterio');
    }
}
