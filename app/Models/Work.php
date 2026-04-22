<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'title',
        'category',
        'cover_image',
        'popup_image',
        'work_date',
        'is_extra',
        'sort_order',
    ];

    protected $casts = [
        'is_extra'  => 'boolean',
        'work_date' => 'date',
    ];
}
