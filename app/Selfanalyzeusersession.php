<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selfanalyzeusersession extends Model
{
    protected $table = 'self_analyze_user_session';

    protected $fillable = [
        'session_id',
        'session_name',
        'filter_data',
        'created_by',
        'updated_by'
    ];
}
