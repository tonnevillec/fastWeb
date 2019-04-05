<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nom', 'alt', 'image', 'store_name',
    ];

    public $table = 'images';

    public $timestamps = false;
}
