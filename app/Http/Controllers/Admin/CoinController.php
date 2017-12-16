<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    /**
     * Create a new controller instance.
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Requests\CreateBranchRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
}
