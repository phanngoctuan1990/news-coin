<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoryCoin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest $request create
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = new CategoryCoin;
        $category->name = $request->name;
        $category->save();
        flash('Tạo mới thể loại coin thành công', 'success');
        return redirect()->route('admin.category-coin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id category id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category       = CategoryCoin::find($id);
        $category->name = htmlentities($category->name);
        return view('admin.category.show', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request update
     * @param int                   $id      category id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = CategoryCoin::find($id);
        $category->name = $request->name;
        $category->save();
        flash('Cập nhật thể loại coin thành công', 'success');
        return redirect()->route('admin.category-coin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id category id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryCoin::find($id);
        if ($category->coins->count()) {
            flash('Thể loại này có chứa coin, bạn không thể xoá.', 'warning');
            return redirect()->back();
        }
        $category->delete();
        flash('Xoá thể loại coin thành công', 'success');
        return redirect()->route('admin.category-coin.index');
    }

    /**
     * Get list category coin show datatables
     *
     * @return void
     */
    public function datatables()
    {
        $result = \Datatables::of(CategoryCoin::query())
            ->addColumn('action', 'admin.category.datatables.browser')
            ->editColumn('name', function ($data) {
                return htmlentities($data->name);
            })
            ->make(true);

        return $result;
    }
}
