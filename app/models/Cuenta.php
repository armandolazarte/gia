<?php

class Cuenta extends Eloquent
{
    //Cuenta __has_many__ Egresos
    public function egresos()
    {
        return $this->hasMany('Egreso');
    }
    
    //Cuenta __has_many__ Ingresos
    public function ingresos()
    {
        return $this->hasMany('Ingreso');
    }
    
    //Cuenta __belongs_to_many__ Proyectos
    public function proyectos()
    {
        return $this->belongsToMany('Proyecto');
    }
    
    //Cuenta __belongs_to__ Urg
    public function urg()
    {
        return $this->belongsTo('Urg');
    }
}
