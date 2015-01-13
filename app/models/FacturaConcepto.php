<?php

class FacturaConcepto extends Eloquent
{
    public $timestamps = false;
    
    //FacturaConcepto __belongs_to__ Factura
    public function factura()
    {
        return $this->belongsTo('Factura');
    }
    
    //FacturaConcepto __belongs_to__ Rm
    public function rm()
    {
        return $this->belongsTo('Rm');
    }
    
    //FacturaConcepto __belongs_to__ Cog
    public function cog()
    {
        return $this->belongsTo('Cog');
    }
}
