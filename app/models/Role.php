<?php

class Role extends Eloquent
{
    //Role __belongs_to_many__ Users
    public function users()
    {
        return $this->belongsToMany('User');
    }
    
    //Role __belongs_to_many__ Modulos
    public function modulos()
    {
        return $this->belongsToMany('Modulos');
    }
}
