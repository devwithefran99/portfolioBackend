<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['ip'];
    // timestamps = true (default) — created_at দিয়ে date track হবে
}