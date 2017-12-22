<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Coin;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.home.index');
    }

    /**
     * Get list coin show datatables
     *
     * @return void
     */
    public function datatables()
    {
        $columns = [
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

        $result = \Datatables::of($coins)
            ->editColumn('name', function ($data) {
                return htmlentities($data->name);
            })
            ->editColumn('cate_name', function ($data) {
                return htmlentities($data->cate_name);
            })
            ->editColumn('thumbnail', function ($data) {
                $url = asset('/images/coins/' . $data->thumbnail);
                return '<img src="' . $url . '" border="0" width="40" align="center" />';
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
