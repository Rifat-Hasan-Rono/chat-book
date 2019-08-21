<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message', 'sender', 'receiver',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
