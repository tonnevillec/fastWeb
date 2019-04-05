<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nom', 'telephone', 'contact_email', 'description', 'logo'
    ];

    public $table = 'entreprise';

    public $timestamps = false;

    public function horaires () {
        return $this->hasMany(Horaires::class);
    }

    public function documents () {
        return $this->hasMany(Documents::class);
    }

    public function images ()
    {
        return $this->hasMany(Images::class);
    }
}
