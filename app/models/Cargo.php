<?php

class Cargo extends Eloquent
{
    public $timestamps = false;

    //Cargo __belongs_to__ User
    public function user()
    {
        return $this->belongsTo('User');
    }

    //Cargo __belongs_to_many__ Urg
    public function urgs()
    {
        return $this->belongsToMany('Urg');
    }
}