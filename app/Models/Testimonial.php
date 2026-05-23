<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'location',
        'review',
        'rating',
        'photo',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'rating'       => 'integer',
        'sort_order'   => 'integer',
    ];
}