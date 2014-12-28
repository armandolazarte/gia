<?php

class Proveedor extends Eloquent
{
    public $table = 'proveedores';
    
    //Proveedor __belongs_to__ Beneficiario
    public function beneficiario()
    {
        return $this->belongsTo('Beneficiario');
    }
    
    //Proveedor __belongs_to_many__ Giros
    public function giros()
    {
        return $this->belongsToMany('Giro');
    }
}
