<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'slug',
        'title',
        'category',
        'content',
        'published_at',
        'updated_at',
    ];
}