<?php

class Urg extends Eloquent
{
    //Urg __has_many__ Alta
    public function altas()
    {
        return $this->hasMany('Alta');
    }
}
