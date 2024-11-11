<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portada extends Model
{
    public $timestamps = false;
    protected $table = 'portada';

    protected $fillable = [
        'imatge1',
        'imatge2',
        'imatge3',
        'actiu',
        'ordre'
    ];
}