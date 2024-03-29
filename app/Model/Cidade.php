<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';

    public function estado()
    {
        return $this->belongsTo('App\Model\Estado');
    }

    public function ocorrencias()
    {
        return $this->hasManyThrough('App\Model\Ocorrencia', 'App\Model\Localizacao');
    }
}
