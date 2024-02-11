<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'naam',
        'slug',
        'beschrijving',
        'merk',
        'foto',
        'categorie',
        'hoeveelheid',
        'prijs',
        'korting_prijs',
        'trending'
    ];
}
