<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Radar extends Model
{
    protected $table = 'radares';

    public function crimes()
    {
        return $this->belongsToMany('App\Model\Crime', 'radar_crime', 'radar_id', 'crime_id');
    }

    public function localizacao()
    {
        return $this->belongsTo('App\Model\Localizacao');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Model\Usuario');
    }
}
