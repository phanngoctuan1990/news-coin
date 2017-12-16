<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Index
     *
     * @return 
     */
    public function index()
    {
        return view('admin.news.index');
    }
    /**
     * Create
     * 
     * @return void
     */
    public function create()
    {
        return view('admin.news.create');
    }
    
    /**
     * Insert data
     *
     * @param CreateNewsRequest $request Request
     * 
     * @return void
     */
    public function store(CreateNewsRequest $request)
    {
        $data = $request->all();
        $new = new News;
        $new->title = $data['title'];
        $new->content = $data['content'];
        $new->save();
        flash('Tạo mới tin tức thành công', 'success');
        return redirect()->route('admin.news.index');
    }
    
    /**
     * Show detail new
     *
     * @param int $id New id
     * 
     * @return void
     */
    public function show($id)
    {
        $new = News::find($id);
        return view('admin.news.show', compact('new'));
    }
    
    /**
     * Update new
     *
     * @param UpdateNewsRequest $request
     * @param int $id New id
     * 
     * @return void
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        $data = $request->all();
        $new = News::find($id);
        $new->title = $data['title'];
        $new->content = $data['content'];
        $new->save();
        flash('Cập nhật tin tức thành công', 'success');
        return redirect()->route('admin.news.index');
    }
    
    /**
     * Delete new
     *
     * @param int $id New id
     *
     * @return void
     */
    public function destroy($id)
    {
        $new = News::find($id);
        $new->delete();
        flash('Xoá tin tức thành công', 'success');
        return redirect()->route('admin.news.index');
    }

    /**
     * Get list new show datatables
     *
     * @return void
     */
    public function datatables()
    {
        return \Datatables::of(News::query())->addColumn('action', 'admin.news.datatables.browser')->make(true);
    }
    
    /**
     * Update status of new
     *
     * @return void
     */
    public function updateStatus($id)
    {
        $new = News::find($id);
        $new->status = News::ACCEPT;
        $new->save();
        flash('Cập nhật trạng thái tin tức thành công', 'success');
        return redirect()->route('admin.news.index');
    }
}
