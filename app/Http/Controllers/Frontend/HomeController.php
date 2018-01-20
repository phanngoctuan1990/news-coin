<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Coin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = \DB::table('news')
                ->orderBy('created_at', 'desc')
                ->where('status', News::ACCEPT)
                ->take(3)
                ->get();
        $totalCoin = Coin::count();
        return view('frontend.home.index', compact('news', 'totalCoin'));
    }

    /**
     * Get list coin show datatables
     *
     * @param Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $columns = [
            'coin.slug',
            'coin.name',
            'thumbnail',
            'rate',
            'hype',
            'scam',
            'moom',
            'stage',
            'price',
            'start_date',
            'end_date',
            'category_coin.name as cate_name'
        ];

        $coins = Coin::select($columns)
                ->join('category_coin', 'category_coin.id', '=', 'coin.category_coin_id')
                ->where('is_publish', Coin::TYPE_PUBLISH);
        if ($request->stage != Coin::TYPE_ALL) {
            $coins = $coins->where('stage', $request->stage);
        }

        $result = \Datatables::of($coins)
            ->editColumn('name', function ($data) {
                return htmlentities($data->name);
            })
            ->editColumn('thumbnail', function ($data) {
                $url = asset('/images/coins/thumbnail/' . $data->thumbnail);
                return '<img src="' . $url . '" border="0" width="40" align="center" /> ';
            })
            ->editColumn('cate_name', function ($data) {
                return htmlentities($data->cate_name);
            })
            ->editColumn('hype', function ($data) {
                return Coin::$convertCoinType[$data->hype];
            })
            ->editColumn('scam', function ($data) {
                return Coin::$convertCoinType[$data->scam];
            })
            ->editColumn('moom', function ($data) {
                return Coin::$convertCoinType[$data->moom];
            })
            ->editColumn('stage', function ($data) {
                return Coin::$convertCoinStage[$data->stage];
            })
            ->editColumn('price', function ($data) {
                return '$' . round($data->price);
            })
            ->editColumn('start_date', function ($data) {
                return Carbon::parse($data->start_date)->format('d.m.Y');
            })
            ->editColumn('end_date', function ($data) {
                return Carbon::parse($data->end_date)->format('d.m.Y');
            })
            ->make(true);

        return $result;
    }
}
