<?php

class Benef extends Eloquent
{
    //Benef __has_many__ Egresos
    public function egresos()
    {
        return $this->hasMany('Egreso');
    }
    
    //Benef __has_many__ Proveedores
    public function proveedores()
    {
        return $this->hasMany('Proveedor');
    }
    
    //Benef __has_many__ Ocs
    public function ocs()
    {
        return $this->hasMany('Oc');
    }
    
    //Benef __has_many__ Cotizaciones
    public function cotizaciones()
    {
        return $this->hasMany('Cotizacion');
    }
    
    //Benef __has_many__ Solicitudes
    public function solicitudes()
    {
        return $this->hasMany('Solicitud');
    }
}
