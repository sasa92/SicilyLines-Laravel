<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferry extends Model
{
    use HasFactory;

   
    protected $fillable = ['nom', 'longueur', 'largeur', 'vitesse', 'photo'];

    public function equipements()
    {
        return $this->belongsToMany(Equipement::class, 'equipement_ferry');
    }
}