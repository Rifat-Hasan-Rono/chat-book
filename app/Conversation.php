<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'last_message', 'sender_id', 'receiver_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
