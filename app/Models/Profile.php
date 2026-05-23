<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = [
        'name', 'tagline', 'bio', 'email', 'phone', 'location',
        'photo', 'cv', 'behance', 'facebook', 'linkedin',
        'whatsapp', 'fiverr', 'telegram', 'open_to_work',
    ];

    protected $casts = [
        'open_to_work' => 'boolean',
    ];

    // সবসময় একটাই row থাকবে
    public static function getSingle(): self
    {
        return self::firstOrCreate(['id' => 1], [
            'name'    => 'Ekram Hossen',
            'tagline' => 'Graphic & UI Designer',
            'email'   => 'ekramhusain60@gmail.com',
        ]);
    }
}