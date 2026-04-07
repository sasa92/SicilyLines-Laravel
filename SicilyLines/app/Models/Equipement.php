<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    
    protected $fillable = ['libelle'];

    public function ferries() {
        return $this->belongsToMany(Ferry::class, 'equipement_ferry');
    }
}
