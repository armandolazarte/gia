<?php

class UrgExterna extends Eloquent
{
    //UrgExterna __has_many__ CompensaExterna
    public function compensaExterna()
    {
        return $this->hasMany('CompensaExterna');
    }
}
