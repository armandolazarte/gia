<?php

class ProyectoTipo extends Eloquent
{
    //ProyectoTipo __has_many__ Proyecto
    public function proyectos()
    {
        return $this->hasMany('Proyecto');
    }
    
    //ProyectoTipo __belongs_to__ CogTipo
    public function cogTipo()
    {
        return $this->belongsTo('CogTipo');
    }
}
