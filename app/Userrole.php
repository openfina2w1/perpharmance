<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userrole extends Model
{
    protected $table = 'user_role';

    protected $fillable = [
        'code',
        'name'
    ];
}
