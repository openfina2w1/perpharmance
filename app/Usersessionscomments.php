<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usersessionscomments extends Model
{
    protected $table = 'user_sessions_comments';

    protected $fillable = [
        'session_id',
        'comment'
    ];
}
