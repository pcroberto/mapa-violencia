<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    public function cidades()
    {
        return $this->hasMany('App\Model\Cidade');
    }
}
