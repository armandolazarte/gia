<?php

class CompDevsRm extends Eloquent
{
    public $timestamps = false;
    
    //CompDevsRm __belongs_to__ CompDev
    public function compDev()
    {
        return $this->belongsTo('CompDev');
    }
}
