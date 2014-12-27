<?php

class Alta extends Eloquent
{
    //Alta __belongs_to__ Urg
    public function urg()
    {
        return $this->belongsTo('Urg');
    }
}
