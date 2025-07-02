<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',
        'price',
        'url',
        'photos',
        'description'
    ];

    protected $casts = [
        'photos' => 'array',
    ];
}
