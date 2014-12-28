<?php

class Concepto extends Eloquent
{
    //Concepto __has_many__ Egresos
    public function egresos()
    {
        return $this->hasMany('Egreso');
    }
    
    //Concepto __has_many__ Ingresos
    public function ingresos()
    {
        return $this->hasMany('Ingreso');
    }
}
