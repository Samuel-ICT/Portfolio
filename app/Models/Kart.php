<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kart extends Model
{
    use HasFactory;

    protected $table = 'karts';
    
    protected $fillable = [
        'naam',
        'email',
        'telefoon_nummer',
        'adres',
        'aantal',
        'prijs',
        'foto',
        'product_naam',
        'product_id',
        'gebruikers_id',
    ];
}
