<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horaires extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'ville', 'adresse', 'jour', 'heure_debut', 'heure_fin',
    ];

    public $timestamps = false;
}
