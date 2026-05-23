<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name', 'icon_path', 'percentage', 'sort_order',
    ];

    protected $casts = [
        'percentage' => 'integer',
        'sort_order' => 'integer',
    ];
}