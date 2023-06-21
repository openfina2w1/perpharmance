<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationLinks extends Model
{
    protected $table = 'registration_links';

    protected $fillable = [
        'link',
        'token',
        'active_status'
    ];
}
