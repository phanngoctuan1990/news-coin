<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBannerRequest;
use App\Models\Images;
use Carbon\Carbon;
use App\Http\Requests\UpdateBannerRequest;
use Intervention\Image\ImageManagerStatic as Image;

class BannerController extends Controller
{
    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        return view('admin.banner.index');
    }
    /**
     * Create
     *
     * @return void
     */
    public function create()
    {
        return view('admin.banner.create');
    }
    
    /**
     * Store
     *
     * @param CreateBannerRequest $request Store
     *
     * @return void
     */
    public function store(CreateBannerRequest $request)
    {
        $data = $request->all();
        $banner = new Images;
        $banner->position = $data['position'];
        if ($data['url']) {
            $banner->url = $data['url'];
        }
        
        // handle image
        if ($data['position'] == Images::ABOUT_US) {
            if ($request->hasFile('original')) {
                \File::delete(public_path('/images/banner/' . $banner->original));
                $img = $request->file('original');
                $input['original'] = time() . '.' . $img->getClientOriginalExtension();
                $imageResize = Image::make($img->getRealPath());
                $imageResize->resize(555, 416.25);
                $imageResize->save(public_path('images/banner/' .$input['original']));
                $banner->image = $input['original'];
            }
        } elseif ($data['position'] == Images::SLIDE) {
            if ($request->hasFile('original')) {
                \File::delete(public_path('/images/banner/' . $banner->original));
                $img = $request->file('original');
                $input['original'] = time() . '.' . $img->getClientOriginalExtension();
                $imageResize = Image::make($img->getRealPath());
                $imageResize->resize(300, 300);
                $imageResize->save(public_path('images/banner/' .$input['original']));
                $banner->image = $input['original'];
            }
        } else {
            if ($request->hasFile('original')) {
                \File::delete(public_path('/images/banner/' . $banner->original));
                $img = $request->file('original');
                $input['original'] = time() . '.' . $img->getClientOriginalExtension();
                $imageResize = Image::make($img->getRealPath());
                $imageResize->resize(1140, 240);
                $imageResize->save(public_path('images/banner/' .$input['original']));
                $banner->image = $input['original'];
            }
        }
        $banner->save();
        flash('Tạo mới banner thành công', 'success');
        return redirect()->route('admin.banner.index');
    }
    
    /**
     * Get list banner show datatables
     *
     * @return void
     */
    public function datatables()
    {
        $result = \Datatables::of(Images::query())
            ->addColumn('action', 'admin.banner.datatables.browser')
            ->editColumn('image', function ($data) {
                $url = asset('/images/banner/' . $data->image);
                return '<img src="' . $url . '" border="0" width="40" align="center" />';
            })
            ->editColumn('position', function ($data) {
                return $data->name_position;
            })
            ->editColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->format('d-m-Y');
            })
            ->make(true);

        return $result;
    }
    
    /**
     * Form detail
     *
     * @param int $id Image id
     *
     * @return void
     */
    public function show($id)
    {
        $banner = Images::find($id);
        $banner->image  = asset('/images/banner/' . $banner->image);
        return view('admin.banner.show', compact('banner'));
    }
    
    /**
     * Form edit
     *
     * @param int $id Image id
     *
     * @return void
     */
    public function edit($id)
    {
        $banner = Images::find($id);
        $banner->image  = asset('/images/banner/' . $banner->image);
        return view('admin.banner.edit', compact('banner'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBannerRequest $request request update
     * @param int                 $id      image id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, $id)
    {
        $data = $request->all();
        $banner = Images::find($id);
        $banner->position = $data['position'];
        if ($data['url']) {
            $banner->url = $data['url'];
        }

        // handle image
        if ($data['position'] == Images::ABOUT_US) {
            if ($request->hasFile('original')) {
                \File::delete(public_path('/images/banner/' . $banner->original));
                $img = $request->file('original');
                $input['original'] = time() . '.' . $img->getClientOriginalExtension();
                $imageResize = Image::make($img->getRealPath());
                $imageResize->resize(555, 416.25);
                $imageResize->save(public_path('images/banner/' .$input['original']));
                $banner->image = $input['original'];
            }
        } elseif ($data['position'] == Images::SLIDE) {
            if ($request->hasFile('original')) {
                \File::delete(public_path('/images/banner/' . $banner->original));
                $img = $request->file('original');
                $input['original'] = time() . '.' . $img->getClientOriginalExtension();
                $imageResize = Image::make($img->getRealPath());
                $imageResize->resize(300, 300);
                $imageResize->save(public_path('images/banner/' .$input['original']));
                $banner->image = $input['original'];
            }
        } else {
            if ($request->hasFile('original')) {
                \File::delete(public_path('/images/banner/' . $banner->original));
                $img = $request->file('original');
                $input['original'] = time() . '.' . $img->getClientOriginalExtension();
                $imageResize = Image::make($img->getRealPath());
                $imageResize->resize(1140, 240);
                $imageResize->save(public_path('images/banner/' .$input['original']));
                $banner->image = $input['original'];
            }
        }
        $banner->save();
        flash('Cập nhật hình ảnh thành công', 'success');
        return redirect()->route('admin.banner.index');
    }
    
    /**
     * Delete image
     *
     * @param int $id Image id
     *
     * @return void
     */
    public function destroy($id)
    {
        $banner = Images::find($id);
        \File::delete(public_path('images/banner/' . $banner->image));
        $banner->delete();
        flash('Xoá hình ảnh thành công', 'success');
        return redirect()->route('admin.banner.index');
    }
}
