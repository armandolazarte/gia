<?php

class Vale extends Eloquent
{
    //Vale __belongs_to__ Egreso
    public function egreso()
    {
        return $this->belongsTo('Egreso');
    }
    
    //Vale __belongs_to__ Proyecto
    public function proyecto()
    {
        return $this->belongsTo('Proyecto');
    }
    
    //Vale __belongs_to_many__ Reintegro
    public function reintegros()
    {
        return $this->belongsToMany('Reintegro')->withPivot('monto');
    }
    
    //Vale __belongs_to_many__ Rm
    public function rms()
    {
        return $this->belongsToMany('Rm')->withPivot('monto');
    }
    
    //Vale __belongs_to_many__ Objetivo
    public function objetivos()
    {
        return $this->belongsToMany('Objetivo')->withPivot('monto');
    }
    
    //Vale __belongs_to_many__ Factura
    public function facturas()
    {
        return $this->belongsToMany('Factura');
    }
}
