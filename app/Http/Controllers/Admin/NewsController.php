<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Intervention\Image\ImageManagerStatic as Image;

class NewsController extends Controller
{
    /**
     * Index
     *
     * @return void
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
        // upload image
        $img = $request->file('thumbnail');
        $input['thumbnail'] = time() . '.' . $img->getClientOriginalExtension();
        $imageResize = Image::make($img->getRealPath());
        $imageResize->save(public_path('images/news/original/' .$input['thumbnail']));
        $new->original = $input['thumbnail'];
        $imageResize->resize(360, 203);
        $imageResize->save(public_path('images/news/thumbnail/' .$input['thumbnail']));
        $new->thumbnail = $input['thumbnail'];
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
        $new->thumbnail  = asset('/images/news/thumbnail/' . $new->thumbnail);
        return view('admin.news.show', compact('new'));
    }
    
    /**
     * Update new
     *
     * @param UpdateNewsRequest $request request
     * @param int               $id      New id
     *
     * @return void
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        $data = $request->all();
        $new = News::find($id);
        $new->title = $data['title'];
        // handle image
        if ($request->hasFile('thumbnail')) {
            \File::delete(public_path('images/news/thumbnail/' . $new->thumbnail));
            \File::delete(public_path('images/news/original/' . $new->thumbnail));
            $img = $request->file('thumbnail');
            $input['thumbnail'] = time() . '.' . $img->getClientOriginalExtension();
            $imageResize = Image::make($img->getRealPath());
            $imageResize->save(public_path('images/news/original/' .$input['thumbnail']));
            $new->original = $input['thumbnail'];
            $imageResize->resize(360, 203);
            $imageResize->save(public_path('images/news/thumbnail/' .$input['thumbnail']));
            $new->thumbnail = $input['thumbnail'];
        }
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
        \File::delete(public_path('images/news/thumbnail/' . $new->thumbnail));
        \File::delete(public_path('images/news/original/' . $new->thumbnail));
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
        return \Datatables::of(News::query())
                ->addColumn('action', 'admin.news.datatables.browser')
                ->editColumn('title', function ($data) {
                    return htmlentities($data->title);
                })
                ->editColumn('content', function ($data) {
                    return str_limit($data->content, 200);
                })
                ->editColumn('thumbnail', function ($data) {
                    $url = asset('/images/news/thumbnail/' . $data->thumbnail);
                    return '<img src="' . $url . '" border="0" width="200" align="center" />';
                })
                ->make(true);
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
        $new = News::find($id);
        $new->status = News::ACCEPT;
        $new->save();
        flash('Cập nhật trạng thái tin tức thành công', 'success');
        return redirect()->route('admin.news.index');
    }
}
