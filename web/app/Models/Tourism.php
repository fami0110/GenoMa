<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tourism extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'category',
        'photos',
        'description',
        'link',
        'address',
        'longitude',
        'latitude',
        'price_min',
        'price_max',
        'facilities',
        'rate',
        'is_recomended',
    ];
}
