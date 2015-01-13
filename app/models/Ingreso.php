<?php

class Ingreso extends Eloquent
{
    use SoftDeletingTrait;
    
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
    
    //Ingreso __belongs_to_many__ Rm
    public function rms()
    {
        return $this->belongsToMany('Rm')->withPivot('monto')->withTimestamps();
    }
}
