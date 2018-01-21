<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Youtube extends Eloquent
{
    protected $table = 'youtube';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
    ];
}
