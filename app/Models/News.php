<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class News extends Eloquent
{
    use Sluggable, SluggableScopeHelpers;

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
        'status',
        'view_number',
        'thumbnail',
        'original',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
