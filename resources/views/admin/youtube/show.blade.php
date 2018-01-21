@extends('admin.layout.master')
@section('title', 'Quản lý link youtube')
@section('content')
<section class="content-header">
    <h1>
        Chi tiết
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.youtube.index') }}">Link youtube</a></li>
        <li class="active">Chi tiết</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" id="form-update-youtube" action="{{ route('admin.youtube.update', $youtube->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Link Youtube</label>
                            <input type="text" value="{{ $youtube->url }}" name="url" class="form-control" placeholder="Nhập link youtube">
                            <br>
                            <label style="color: red">* Chú ý nhập link theo định dạng - Ví dụ: https://www.youtube.com/embed/tbegIkZ4UzQ</label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('admin.youtube.index') }}" class="btn btn-danger btn-sm">Thoát</a>
                        <button type="submit" class="btn btn-primary btn-sm">Sửa</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\UpdateYoutubeRequest', '#form-update-youtube') !!}
@endsection