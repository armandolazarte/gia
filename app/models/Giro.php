<?php

class Giro extends Eloquent
{
    //Giro __belongs_to_many__ Proveedores
    public function proveedores()
    {
        return $this->belongsToMany('Proveedor');
    }
}
