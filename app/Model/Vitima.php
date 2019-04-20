<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vitima extends Model
{
    protected $table = 'vitimas';

    public function ocorrencia()
    {
        return $this->hasOne('App\Model\Ocorrencia');
    }
}
