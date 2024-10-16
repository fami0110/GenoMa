<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Msmes extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'category',
        'photos',
        'description',
        'link',
        'address',
        'contact',
        'longitude',
        'latitude',
        'price_min',
        'price_max',
        'schedules',
        'rate',
        'is_recomended',
    ];
}
