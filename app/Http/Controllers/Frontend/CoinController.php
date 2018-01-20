<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Coin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoinController extends Controller
{
    /**
     * Get coin detail
     *
     * @param string $slug News slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $coin = Coin::findBySlugOrFail($slug);
        return view('frontend.layout.coin.show', compact('coin'));
    }
}
