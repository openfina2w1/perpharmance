<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'ws_file';

    protected $fillable = [
        'dtt',
        'titl',
        'pdfid',
        'edt',
        'edtm',
        'eby',
        'stat'
    ];
}
