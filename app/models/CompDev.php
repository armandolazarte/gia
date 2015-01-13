<?php

class CompsDev extends Eloquent
{
    //CompsDev __belongs_to__ Comp
    public function comp()
    {
        return $this->belongsTo('Comp');
    }
    
    //CompsDev __has_many__ CompDevsRm
    public function compDevsRms()
    {
        return $this->hasMany('CompDevsRm');
    }
}
