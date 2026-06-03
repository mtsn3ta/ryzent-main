<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [

        'site_name',
        'tagline',

        'logo',
        'favicon',

        'email',
        'phone',
        'whatsapp',

        'address',
        'google_maps',

        'instagram',
        'facebook',
        'linkedin',
        'github',
        'youtube',
        'tiktok',

        'meta_title',
        'meta_description',

        'og_image',
    ];
}
