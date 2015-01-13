<?php

class Egreso extends Eloquent
{
    use SoftDeletingTrait;
    
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
    
    //Egreso __belongs_to__ Benef
    public function benef()
    {
        return $this->belongsTo('Benef');
    }
    
    //Egreso __has_many__ Honorarios
    public function honorarios()
    {
        return $this->hasMany('Honorario');
    }
    
    //Egreso __has_many__ Vales
    public function vales()
    {
        return $this->hasMany('Vale');
    }
    
    //Egreso __belongs_to_many__ Rm
    public function rms()
    {
        return $this->belongsToMany('Rm')->withPivot('monto')->withTimestamps();
    }
    
    //Egreso __belongs_to_many__ Comp
    public function comps()
    {
        return $this->belongsToMany('Comp');
    }
    
    //Egreso __belongs_to_many__ Solicitud
    public function solicitudes()
    {
        return $this->belongsToMany('Solicitud');
    }
    
    //Egreso __belongs_to_many__ Oc
    public function ocs()
    {
        return $this->belongsToMany('Oc');
    }
}
