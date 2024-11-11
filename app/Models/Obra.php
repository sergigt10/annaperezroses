<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    public $timestamps = false;
    protected $table = 'obres';

    protected $fillable = [
        'imatge1',
        'categoria',
        'actiu',
        'ordre'
    ];

}
