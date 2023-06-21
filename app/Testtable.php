<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testtable extends Model
{
    protected $table = 'testtable';

    protected $fillable = [
        'name',
        'email'
    ];
}
