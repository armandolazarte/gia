<?php

class Cotizacion extends Eloquent
{
    public $table = 'cotizaciones';
    use SoftDeletingTrait;
    
    //Cotizacion __belongs_to__ Req
    public function req()
    {
        return $this->belongsTo('Req');
    }
    
    //Cotizacion __belongs_to__ Benef
    public function benef()
    {
        return $this->belongsTo('Benefs');
    }
    
    //Cotizacion __belongs_to_many__ Articulo
    public function articulos()
    {
        return $this->belongsToMany('Articulo')->withPivot('costo', 'sel')->withTimestamps();
    }
    
    //Cotizacion __belongs_to_many__ Cuadro
    public function cuadros()
    {
        return $this->belongsToMany('Cuadro')->withPivot('criterio');
    }
}
