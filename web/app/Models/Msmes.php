<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msmes extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'category',
        'foto',
        'description',
        'link',
        'alamat',
        'contact',
        'longitude',
        'latitude',
        'price_min',
        'price_max',
        'facility',
        'rate',
        'is_recomended',
    ];
}
