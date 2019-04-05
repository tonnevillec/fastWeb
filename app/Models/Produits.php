<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nom', 'actif', 'disponible', 'prix', 'photo',
    ];

    public $timestamps = false;

    public function categorie () {
        return $this->belongsTo(Categories::class, 'categorie');
    }
}
