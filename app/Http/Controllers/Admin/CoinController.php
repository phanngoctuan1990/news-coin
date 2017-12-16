<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Coin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCoinRequest;

class CoinController extends Controller
{
    /**
     * Create a coin controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.coin.index');
    }

    /**
     * Show the Branch create.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coin.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request update
     * @param int                      $id      id      branch
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }
    
    /**
     * Show the form detail branch
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    
    /**
     * Store a coinly created resource in storage.
     *
     * @param CreateCoinRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCoinRequest $request)
    {
        $data = $request->all();
        $coin = new Coin;
        $coin->name = $data['name'];
        $coin->rate = $data['rate'];
        $coin->hype = $data['hype'];
        $coin->scam = $data['scam'];
        $coin->moom = $data['moom'];
        $coin->price = $data['price'];
        $coin->stage = $data['stage'];
        $coin->start_date = Carbon::parse($data['start_date'])->format('Y-m-d');
        $coin->end_date = Carbon::parse($data['end_date'])->format('Y-m-d');;
        $coin->round = 'round';

        // upload image
        $img = $request->file('thumbnail');
        $input['thumbnail'] = time() . '.' . $img->getClientOriginalExtension();
        $destinationPath = public_path('/images/coins/');
        $img->move($destinationPath, $input['thumbnail']);
        $coin->thumbnail = $input['thumbnail'];

        $coin->save();
        return redirect()->route('admin.coin.index');
    }

    /**
     * Get list coin show datatables
     *
     * @return void
     */
    public function datatables()
    {
        $result = \Datatables::of(Coin::query())
            ->addColumn('action', 'admin.coin.datatables.browser')
            ->editColumn('name', function ($data) {
                return htmlentities($data->name);
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
                return '$' . $data->stage;
            })
            ->editColumn('start_date', function ($data) {
                return Carbon::parse($data->start_date)->format('d-m-Y');
            })
            ->editColumn('end_date', function ($data) {
                return Carbon::parse($data->end_date)->format('d-m-Y');
            })
            ->make(true);

        return $result;
    }
}
