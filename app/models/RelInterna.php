<?php

class RelInterna extends Eloquent
{
    //RelInterna __has_many__ RelInternaDoc
    public function relInternaDocs()
    {
        return $this->hasMany('RelInternaDoc');
    }
}
