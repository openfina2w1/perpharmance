<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maillog extends Model
{
    protected $table = 'mail_log';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mail_type',
        'mail_status'
    ];
}
