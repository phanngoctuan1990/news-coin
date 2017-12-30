<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class News extends Eloquent
{
    const ACCEPT = 1;

    protected $table = 'news';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'thumbnail',
        'original',
    ];
}
