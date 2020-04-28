<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $primaryKey = "id_classe";

    protected $fillable = [
        'id_classe',
        'numero',
        'description',
        'created_at',
        'updated_at'
    ];

    protected $table = 'types';
}
