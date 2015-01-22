<?php

class ProyectoTipo extends Eloquent
{
    //ProyectoTipo __has_many__ Proyecto
    public function proyectos()
    {
        return $this->hasMany('Proyecto');
    }
    
    //ProyectoTipo __has_many Cog
    public function cog()
    {
        return $this->hasMany('Cog');
    }
}
