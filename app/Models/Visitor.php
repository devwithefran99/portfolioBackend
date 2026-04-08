<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['ip', 'visited_at'];

    public $timestamps = false; // jodi created_at/updated_at use na koro
}
