<?php

class BmsRm extends Eloquent
{
    //BmsRm __belongs_to__ Rm
    public function rm()
    {
        return $this->belongsTo('Rm');
    }
}
