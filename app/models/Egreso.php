<?php

class Egreso extends Eloquent
{
    //Egreso __belongs_to__ Cuenta
    public function cuenta()
    {
        return $this->belongsTo('Cuenta');
    }
    
    //Egreso __belongs_to__ Concepto
    public function concepto()
    {
        return $this->belongsTo('Concepto');
    }
    
    //Egreso __belongs_to__ Beneficiario
    public function beneficiario()
    {
        return $this->belongsTo('Beneficiario');
    }
}
