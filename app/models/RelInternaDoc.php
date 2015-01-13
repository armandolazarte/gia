<?php

class RelInternaDoc extends Eloquent
{
    public $timestamps = false;
    
    //RelInternaDoc __belongs_to__ RelInterna
    public function relInterna()
    {
        return $this->belongsTo('RelInterna');
    }
}
