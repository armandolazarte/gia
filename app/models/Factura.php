<?php

class Factura extends Eloquent
{
    //Factura __has_many__ FacturaConcepto
    public function facturaConceptos()
    {
        return $this->hasMany('FacturaConcepto');
    }
    
    //Factura __belongs_to_many__ Vale
    public function vales()
    {
        return $this->belongsToMany('Vale');
    }
    
    //Factura __belongs_to_many__ Solicitud
    public function solicitudes()
    {
        return $this->belongsToMany('Solicitud');
    }
    
    //Factura __belongs_to_many__ CompFactura
    public function compFacturas()
    {
        return $this->belongsToMany('CompFactura');
    }
}
