@extends('admin.layout.master')
@section('title', 'Quản lý hình ảnh')
@section('content')
<section class="content-header">
    <h1>
        Xem chi tiết
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.news.index') }}">Hình ảnh</a></li>
        <li class="active">Chi tiết</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" value="{{ $banner->url }}" disabled="disabled" name="url" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <image src="{{ $banner->image }}" />
                        </div>
                        <div class="form-group">
                            <label>Vị trí hiển thị: <label style="color: red">{{ $banner->name_position }}</label></label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('admin.banner.index') }}" class="btn btn-danger btn-sm">Thoát</a>
                        <a href="{{ route('admin.banner.edit', $banner->id) }}" class="btn btn-primary btn-sm">Chỉnh sửa</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
