<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
	const LOW = 1;
	const MID = 2;
	const HIGH = 3;
	const VERY_LOW = 0;
	const VERY_HIGH = 4;

	const ICO = 0;
	const SCAM = 0;
	const ENDED = 0;
	const EXCHANGE = 0;
	const ICO_TODAY = 0;

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
        'stage',
        'price',
        'round',
    ];
}
