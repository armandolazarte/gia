<?php

class Comp extends Eloquent
{
    use SoftDeletingTrait;
    
    //Comp __has_many__ CompsDev
    public function compsDevs()
    {
        return $this->hasMany('CompsDev');
    }
    
    //Comp __belongs_to_many__ Egreso
    public function egresos()
    {
        return $this->belongsToMany('Egreso');
    }
    
    //Comp __belongs_to_many__ Paquete
    public function paquetes()
    {
        return $this->belongsToMany('Paquete');
    }
    
    //Comp __belongs_to_many__ Factura
    public function facturas()
    {
        return $this->belongsToMany('Factura');
    }
}
