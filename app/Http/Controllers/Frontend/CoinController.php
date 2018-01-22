<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Coin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Images;

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
        $bannerHeader = \DB::table('images')
                ->where('position', Images::HEADER)
                ->orderBy('updated_at', 'desc')
                ->first();
        $bannerFooter = \DB::table('images')
                ->where('position', Images::FOOTER)
                ->orderBy('updated_at', 'desc')
                ->first();
        $coin = Coin::findBySlugOrFail($slug);
        return view('frontend.layout.coin.show', compact('coin', 'bannerHeader', 'bannerFooter'));
    }
}
