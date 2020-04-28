<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $primaryKey = "reference";

    protected $fillable = [
        'reference',
        'nom',
        'description',
        'quantite',
        'id_classe',
        'seuil_securite',
        'prix',
        'created_at',
        'updated_at'
    ];

    protected $table = 'produits';
}
