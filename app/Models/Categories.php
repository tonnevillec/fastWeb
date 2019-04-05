<?php

namespace App\Models;

use App\Models\Produits;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nom', 'actif',
    ];

    public $timestamps = false;

    public function produits () {
        return $this->hasMany(Produits::class);
    }
}
