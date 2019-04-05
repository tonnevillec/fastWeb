<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nom', 'format', 'fichier', 'store_name',
    ];

    public $table = 'documents';

    public $timestamps = false;
}
