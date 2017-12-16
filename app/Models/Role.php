<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Role extends Eloquent {

    const POST_NEWS = 1;
    const REVIEW_NEWS = 2;
    const POST_COIN = 3;
    const REVIEW_COIN = 4;

    protected $table = 'role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

}
