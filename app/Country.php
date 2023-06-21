<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    protected $fillable = [
        'country_name',
        'created_at',
        'updated_at'
    ];
}
