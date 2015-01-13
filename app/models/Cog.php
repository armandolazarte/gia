<?php

class Cog extends Eloquent
{
    //Cog __belongs_to__ CogTipo
    public function cogTipo()
    {
        return $this->belongsTo('Urg');
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
