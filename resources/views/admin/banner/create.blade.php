@extends('admin.layout.master')
@section('title', 'Quản lý hình ảnh')
@section('content')
<section class="content-header">
    <h1>
        Tạo mới hình ảnh
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.news.index') }}">Hình ảnh</a></li>
        <li class="active">Tạo mới</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" id="form-create-banner" action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" name="url" class="form-control" placeholder="Nhập link">
                        </div>
                        <div class="form-group">
                            <label>Upload hình ảnh</label>
                            <input type="file" name="original">
                        </div>
                        <div class="form-group">
                            <label>Vị trí hiển thị</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="position" value="{{ App\Models\Images::HEADER }}">
                                    Header
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="position" value="{{ App\Models\Images::FOOTER }}">
                                    Footer
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="position" value="{{ App\Models\Images::SLIDE }}">
                                    Slider
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="position" value="{{ App\Models\Images::ABOUT_US }}">
                                    Giới thiệu
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\CreateBannerRequest', '#form-create-banner') !!}
@endsection