<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Images extends Eloquent
{
    const HEADER = 1;
    
    const FOOTER = 2;
    
    const SLIDE  = 3;
    
    const ABOUT_US = 4;

    protected $table = 'images';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'image',
        'position',
    ];
    
    /**
     * Attribute get name position
     *
     * @return string
     */
    public function getNamePositionAttribute()
    {
        switch ($this->position) {
            case Images::HEADER:
                return 'Header';
            case Images::FOOTER:
                return 'Footer';
            case Images::SLIDE:
                return 'Silde';
            case Images::ABOUT_US:
                return 'Giới thiệu';
        }
    }
}
