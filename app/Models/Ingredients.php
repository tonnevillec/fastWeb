<?php

namespace App\Models;

use App\Models\Produits;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nom', 'actif',
    ];

    public $timestamps = false;

    public function produits () {
        return $this->belongsToMany(Produits::class, 'produit');
    }
}
