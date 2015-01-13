<?php

class Proveedor extends Eloquent
{
    public $table = 'proveedores';
    
    //Proveedor __belongs_to__ Benef
    public function benef()
    {
        return $this->belongsTo('Benef');
    }
    
    //Proveedor __belongs_to_many__ Giros
    public function giros()
    {
        return $this->belongsToMany('Giro');
    }
}
