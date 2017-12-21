<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Coin extends Eloquent
{
    const TYPE_LOW = 1;
    const TYPE_HIGH = 3;
    const TYPE_MEDIUM = 2;
    const TYPE_VERY_LOW = 0;
    const TYPE_VERY_HIGH = 4;

    const TYPE_ICO = 2;
    const TYPE_SCAM = 4;
    const TYPE_ENDED = 0;
    const TYPE_EXCHANGE = 1;
    const TYPE_ICO_TODAY = 3;

    const TYPE_PUBLISH = 1;

    protected $table = 'coin';

    protected $fillable = [
        'name',
        'thumbnail',
        'rate',
        'hype',
        'scam',
        'moom',
        'start_date',
        'end_date',
        'category_coin_id',
        'is_publish',
        'stage',
        'price',
        'round',
    ];

    /**
     * Mapping type to string
     *
     * @var array
     */
    public static $convertCoinType = [
        self::TYPE_LOW => '<strong style="color: #ef4136">Thấp</strong>',
        self::TYPE_HIGH => '<strong style="color: #6aa84f">Cao</strong>',
        self::TYPE_MEDIUM => '<strong style="color: #e69138">Trung bình</strong>',
        self::TYPE_VERY_LOW => '<strong style="color: #991425">Rất thấp</strong>',
        self::TYPE_VERY_HIGH => '<strong style="color: #38761d">Rất cao</strong>',
    ];

    /**
     * Mapping type to string
     *
     * @var array
     */
    public static $convertCoinStage = [
        self::TYPE_ICO => '<strong>ICO</strong>',
        self::TYPE_SCAM => '<strong>SCAM</strong>',
        self::TYPE_ENDED => '<strong>ENDED</strong>',
        self::TYPE_EXCHANGE => '<strong>EXCHANGE</strong>',
        self::TYPE_ICO_TODAY => '<strong>ICO TODAY</strong>',
    ];
}
