<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'user_id', 'website', 'facebook', 'twitter', 'instagram', 'linkedin', 'dribbble', 'youtube', 'google', 'whatsapp', 'about', 'media',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
