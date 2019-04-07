<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    protected $table = 'crimes';
    
    protected $fillable = ['descricao'];
}
