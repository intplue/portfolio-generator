<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    protected $fillable = [
        'user_id',
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
        'is_public',
        'share_token',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}