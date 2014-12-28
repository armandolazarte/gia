<?php

class Ingreso extends Eloquent
{
    //Ingreso __belongs_to__ Cuenta
    public function cuenta()
    {
        return $this->belongsTo('Cuenta');
    }
    
    //Ingreso __belongs_to__ Concepto
    public function concepto()
    {
        return $this->belongsTo('Concepto');
    }
}
