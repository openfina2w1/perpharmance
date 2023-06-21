<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempuser extends Model
{
    protected $table = 'temp_users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'user_role',
        'company_name',
        'company_address',
        'zip_code',
        'refer_code',
        'created_at',
        'updated_at'
    ];
}
