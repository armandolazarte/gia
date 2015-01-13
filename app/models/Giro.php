<?php

class Giro extends Eloquent
{
    public $timestamps = false;
    
    //Giro __belongs_to_many__ Proveedores
    public function proveedores()
    {
        return $this->belongsToMany('Proveedor');
    }
}
