<?php

class TipoProyecto extends Eloquent
{
    public $timestamps = false;

    //TipoProyecto __has_many__ Proyecto
    public function proyectos()
    {
        return $this->hasMany('Proyecto');
    }
    
    //TipoProyecto __has_many__ Cog
    public function cog()
    {
        return $this->hasMany('Cog');
    }

    //TipoProyecto __morph_many__ Acceso
    public function accesos()
    {
        return $this->morphMany('Acceso', 'acceso');
    }
}
