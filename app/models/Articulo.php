<?php

class Articulo extends Eloquent
{
    use SoftDeletingTrait;
    
    //Articulo __belongs_to__ Req
    public function req()
    {
        return $this->belongsTo('Req');
    }
    
    //Articulo __belongs_to__ Oc
    public function oc()
    {
        return $this->belongsTo('Oc');
    }
    
    //Articulo __belongs_to__ Rm
    public function rm()
    {
        return $this->belongsTo('Rm');
    }
    
    //Articulo __belongs_to_many__ Cotizacion
    public function cotizaciones()
    {
        return $this->belongsToMany('Cotizacion')->withPivot('costo', 'sel')->withTimestamps();
    }
}