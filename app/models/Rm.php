<?php

class Rm extends Eloquent
{
    //RM __belongs_to__ Proyecto
    public function proyecto()
    {
        return $this->belongsTo('Proyecto');
    }
    
    //RM __belongs_to__ Objetivo
    public function objetivo()
    {
        return $this->belongsTo('Objetivo');
    }
    
    //RM __belongs_to__ Actividad
    public function actividad()
    {
        return $this->belongsTo('Actividad');
    }
    
    //RM __belongs_to__ Cog
    public function cog()
    {
        return $this->belongsTo('Cog');
    }
    
    //RM __belongs_to__ Fondo
    public function fondo()
    {
        return $this->belongsTo('Fondo');
    }
    
    //Rm __has_many__ CompensaOrigen
    public function compensaOrigenes()
    {
        return $this->hasMany('CompensaOrigen');
    }
    
    //Rm __has_many__ CompensaDestino
    public function compensaDestinos()
    {
        return $this->hasMany('CompensaDestino');
    }
    
    //Rm __has_many__ Articulo
    public function articulos()
    {
        return $this->hasMany('Articulo');
    }
    
    //Rm __has_many__ Honorario
    public function honorarios()
    {
        return $this->hasMany('Honorario');
    }
    
    //Rm __has_many__ FactConcepto
    public function factConceptos()
    {
        return $this->hasMany('FactConcepto');
    }
    
    //Rm __has_many__ BmsRm
    public function bmsRm()
    {
        return $this->hasMany('BmsRm');
    }
    
    //Rm __belongs_to_many__ Ingreso
    public function ingresos()
    {
        return $this->belongsToMany('Ingreso')->withPivot('monto')->withTimestamps();
    }
    
    //Rm __belongs_to_many__ Egreso
    public function egresos()
    {
        return $this->belongsToMany('Egreso')->withPivot('monto')->withTimestamps();
    }
}