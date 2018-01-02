<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Coin;
use App\Models\CategoryCoin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCoinRequest;
use App\Http\Requests\UpdateCoinRequest;

class CoinController extends Controller
{
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
     * Show the Coin create.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryCoin::get(['id', 'name']);
        if ($categories->count()) {
            return view('admin.coin.create', compact('categories'));
        }
        flash('Thể loại coin hiện tại không có, bạn hãy tạo thể loại coin trước khi tạo coin.', 'warning');
        return redirect()->route('admin.category-coin.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCoinRequest $request request update
     * @param int               $id      coin id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoinRequest $request, $id)
    {
        $data = $request->all();
        $coin = Coin::find($id);
        $coin->category_coin_id = $data['category_coin_id'];
        $coin->name       = $data['name'];
        $coin->rate       = $data['rate'];
        $coin->hype       = $data['hype'];
        $coin->scam       = $data['scam'];
        $coin->moom       = $data['moom'];
        $coin->price      = $data['price'];
        $coin->stage      = $data['stage'];
        $coin->start_date = Carbon::parse($data['start_date'])->format('Y-m-d');
        $coin->end_date   = Carbon::parse($data['end_date'])->format('Y-m-d');

        // handle image
        if ($request->hasFile('thumbnail')) {
            \File::delete(public_path('/images/coins/' . $coin->thumbnail));
            $img = $request->file('thumbnail');
            $input['thumbnail'] = time() . '.' . $img->getClientOriginalExtension();
            $destinationPath = public_path('/images/coins/');
            $img->move($destinationPath, $input['thumbnail']);
            $coin->thumbnail = $input['thumbnail'];
        }

        $coin->save();
        flash('Cập nhật coin thành công', 'success');
        return redirect()->route('admin.coin.index');
    }
    
    /**
     * Show the form detail coin
     *
     * @param int $id coin id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coin             = Coin::find($id);
        $coin->thumbnail  = asset('/images/coins/' . $coin->thumbnail);
        $coin->start_date = Carbon::parse($coin->start_date)->format('d-m-Y');
        $coin->end_date   = Carbon::parse($coin->end_date)->format('d-m-Y');
        $coin->name       = htmlentities($coin->name);
        $coin->rate       = htmlentities($coin->rate);
        $categories = CategoryCoin::get(['id', 'name']);
        if ($categories->count()) {
            return view('admin.coin.show', compact('coin', 'categories'));
        }
        flash('Thể loại coin hiện tại không có, bạn hãy tạo thể loại coin trước khi tạo coin.', 'warning');
        return redirect()->route('admin.category-coin.index');
    }

    /**
     * Delete coin
     *
     * @param int $id Coin id
     *
     * @return void
     */
    public function destroy($id)
    {
        $coin = Coin::find($id);
        $coin->delete();
        \File::delete(public_path('/images/coins/' . $coin->thumbnail));
        flash('Xoá coin thành công', 'success');
        return redirect()->route('admin.coin.index');
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
        $coin->category_coin_id = $data['category_coin_id'];
        $coin->name             = $data['name'];
        $coin->rate             = $data['rate'];
        $coin->hype             = $data['hype'];
        $coin->scam             = $data['scam'];
        $coin->moom             = $data['moom'];
        $coin->price            = $data['price'];
        $coin->stage            = $data['stage'];
        $coin->start_date       = Carbon::parse($data['start_date'])->format('Y-m-d');
        $coin->end_date         = Carbon::parse($data['end_date'])->format('Y-m-d');
        $coin->round            = 'round';

        // upload image
        $img = $request->file('thumbnail');
        $input['thumbnail'] = time() . '.' . $img->getClientOriginalExtension();
        $destinationPath = public_path('/images/coins/');
        $img->move($destinationPath, $input['thumbnail']);
        $coin->thumbnail = $input['thumbnail'];

        $coin->save();
        flash('Tạo mới coin thành công', 'success');
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
                return '$' . round($data->price);
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

    /**
     * Update status of new
     *
     * @param int $id New id
     *
     * @return void
     */
    public function updateStatus($id)
    {
        $coin = Coin::find($id);
        $coin->is_publish = Coin::TYPE_PUBLISH;
        $coin->save();
        flash('Cập nhật trạng thái coin thành công', 'success');
        return redirect()->route('admin.coin.index');
    }
}
