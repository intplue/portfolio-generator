<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'contact_number',
        'address',
        'profile_picture',
        'about_me',
        'educational_background',
        'work_experience',
        'skills',
        'projects',
        'website',
        'linkedin',
        'github',
        'social_links',
        'additional_info',
        'template',
        'accent_color',
        'layout_style',
    ];
}