<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'gallery_images',
        'excerpt',
        'content',
        'category',
        'status',
        'demo_url',
        'github_url',
        'sort_order',
        'is_featured',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
    ];
}