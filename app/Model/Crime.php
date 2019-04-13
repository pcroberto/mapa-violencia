<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    protected $table = 'crimes';

    public function radares()
    {
        return $this->belongToMany('App\Model\Radar', 'radar_crime', 'crime_id', 'radar_id');
    }
}
