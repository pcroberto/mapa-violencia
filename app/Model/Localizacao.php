<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Phaza\LaravelPostgis\Eloquent\PostgisTrait;

class Localizacao extends Model
{
    use PostgisTrait;

    protected $table = 'localizacoes';

    protected $postgisFields = [
        'local',
    ];

    protected $postgisTypes = [
        'local' => [
            'geomtype' => 'geography',
            'srid' => 4326
        ]
    ];

    public function cidade()
    {
        return $this->belongsTo('App\Model\Cidade');
    }
}
