<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title', 'description', 'tags', 'is_published', 'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'sort_order'   => 'integer',
    ];

    // tags string থেকে array
    public function getTagsArrayAttribute(): array
    {
        return $this->tags
            ? array_map('trim', explode(',', $this->tags))
            : [];
    }
}