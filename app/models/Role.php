<?php

class Role extends Eloquent
{
    public $timestamps = false;

    //Role __belongs_to_many__ User
    public function users()
    {
        return $this->belongsToMany('User');
    }
    
    //Role __belongs_to_many__ Modulo
    public function modulos()
    {
        return $this->belongsToMany('Modulo');
    }
}
