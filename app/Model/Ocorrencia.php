<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    protected $table = 'ocorrencias';

    public function crime()
    {
        return $this->belongsTo('App\Model\Crime');
    }

    public function localizacao()
    {
        return $this->belongsTo('App\Model\Localizacao');
    }

    public function vitima()
    {
        return $this->belongsTo('App\Model\Vitima');
    }
}
