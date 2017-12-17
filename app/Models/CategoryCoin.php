<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class CategoryCoin extends Eloquent
{
    protected $table = 'category_coin';

    protected $fillable = [
        'name',
    ];

    protected $appends = [
        'hasCoins',
    ];

    /**
     * Get category has many coin.
     */
    public function coins() {
        return $this->hasMany(Coin::class, 'category_coin_id');
    }

    /**
     * Check has coins or not
     *
     * @return mixed
     */
    public function getHasCoinsAttribute()
    {
        return $this->coins()->exists();
    }
}
