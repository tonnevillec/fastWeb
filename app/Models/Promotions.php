<?php

namespace App\Models;

use App\Models\Produits;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nom', 'actif', 'date_debut', 'date_fin', 'pourcentage_remise',
    ];

    protected $dates = ['date_debut', 'date_fin'];

    public $timestamps = false;

    public function produits () {
        return $this->belongsToMany(Produits::class);
    }
}
