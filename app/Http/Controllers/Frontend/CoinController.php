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
     * @param int $id Coin id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coin = Coin::findOrFail($id);
        return view('frontend.layout.coin.show', compact('coin'));
    }
}
