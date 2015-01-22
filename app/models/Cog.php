<?php

class Cog extends Eloquent
{
    //Cog __belongs_to__ ProyectoTipo
    public function proyectoTipo()
    {
        return $this->belongsTo('ProyectoTipo');
    }
    
    //Cog __has_many__ Rm
    public function rms()
    {
        return $this->hasMany('Rm');
    }
    
    //Cog __has_many__ FacturaConcepto
    public function facturaConceptos()
    {
        return $this->hasMany('FacturaConcepto');
    }
}
