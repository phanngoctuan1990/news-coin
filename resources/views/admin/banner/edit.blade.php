@extends('admin.layout.master')
@section('title', 'Quản lý hình ảnh')
@section('content')
<section class="content-header">
    <h1>
        Chỉnh sửa thông tin
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.banner.index') }}">Hình ảnh</a></li>
        <li class="active">Chỉnh sửa</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" id="form-update-banner" action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" value="{{ $banner->url }}" name="url" class="form-control" placeholder="Nhập link">
                        </div>
                        <div class="form-group">
                            <label>Upload hình ảnh</label>
                            <input type="file" name="original">
                            <br>
                            <img src="{{ $banner->image }}" border="0" width="40" align="center" />
                        </div>
                        <div class="form-group">
                            <label>Vị trí hiển thị</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="position" value="{{ App\Models\Images::HEADER }}" {{ $banner->position == App\Models\Images::HEADER ? 'checked':'' }}>
                                    Header
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="position" value="{{ App\Models\Images::FOOTER }}" {{ $banner->position == App\Models\Images::FOOTER ? 'checked':'' }}>
                                    Footer
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="position" value="{{ App\Models\Images::SLIDE }}" {{ $banner->position == App\Models\Images::SLIDE ? 'checked':'' }}>
                                    Slider
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="position" value="{{ App\Models\Images::ABOUT_US }}" {{ $banner->position == App\Models\Images::ABOUT_US ? 'checked':'' }}>
                                    Giới thiệu
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\UpdateBannerRequest', '#form-update-banner') !!}
@endsection