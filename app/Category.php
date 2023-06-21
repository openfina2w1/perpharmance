<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name',
        'slug',
        'descprition',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];
}
