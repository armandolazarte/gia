<?php

class Req extends Eloquent
{
    use SoftDeletingTrait;
    
    //Req __belongs_to__ Urg
    public function urg()
    {
        return $this->belongsTo('Urg');
    }

    //Req __belongs_to__ Proyecto
    public function proyecto()
    {
        return $this->belongsTo('Proyecto');
    }
    
    //Req __has_many__ Articulo
    public function articulos()
    {
        return $this->hasMany('Articulo');
    }
    
    //Req __has_many__ Cotizacion
    public function cotizaciones()
    {
        return $this->hasMany('Cotizacion');
    }
    
    //Req __has_many__ Oc
    public function ocs()
    {
        return $this->hasMany('Oc');
    }
    
    //Req __has_many__ Cuadro
    public function cuadros()
    {
        return $this->hasMany('cuadros');
    }
}
