<?php

class Beneficiario extends Eloquent
{
    //Beneficiario __has_many__ Egresos
    public function egresos()
    {
        return $this->hasMany('Egreso');
    }
    
    //Beneficiario __has_many__ Proveedores
    public function proveedores()
    {
        return $this->hasMany('Proveedor');
    }
}
