<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateYoutubeRequest;
use App\Models\Youtube;
use Carbon\Carbon;
use App\Http\Requests\UpdateYoutubeRequest;

class YoutubeController extends Controller
{
    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        return view('admin.youtube.index');
    }
    /**
     * Create
     *
     * @return void
     */
    public function create()
    {
        return view('admin.youtube.create');
    }
    
    /**
     * Store
     *
     * @return void
     */
    public function store(CreateYoutubeRequest $request)
    {
        $data = $request->all();
        $linkYoutube = new Youtube;
        $linkYoutube->url = $data['url'];
        $linkYoutube->save();
        flash('Tạo mới link youtube thành công', 'success');
        return redirect()->route('admin.youtube.index');
    }
    
    /**
     * Get list link youtube show datatables
     *
     * @return void
     */
    public function datatables()
    {
        $result = \Datatables::of(Youtube::query())
            ->addColumn('action', 'admin.youtube.datatables.browser')
            ->editColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->format('d-m-Y');
            })
            ->make(true);

        return $result;
    }
    
    /**
     * Form detail
     * 
     * @param int $id Youtube id
     *
     * @return void
     */
    public function show($id)
    {
        $linkYoutube = Youtube::find($id);
        return view('admin.youtube.show', compact('linkYoutube'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param UpdateYoutubeRequest $request request update
     * @param int                 $id       Youtube id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYoutubeRequest $request, $id)
    {
        $data = $request->all();
        $linkYoutube = Youtube::find($id);
        $linkYoutube->url = $data['url'];
        $linkYoutube->save();
        flash('Cập nhật link youtube thành công', 'success');
        return redirect()->route('admin.youtube.index');
    }
    
    /**
     * Delete link youtube
     *
     * @param int $id Youtube id
     *
     * @return void
     */
    public function destroy($id)
    {
        $linkYoutube = Youtube::find($id);
        $linkYoutube->delete();
        flash('Xoá link youtube thành công', 'success');
        return redirect()->route('admin.youtube.index');
    }
}
