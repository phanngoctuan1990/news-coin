@extends('admin.layout.master')
@section('title', 'Quản lý link youtube')
@section('content')
<section class="content-header">
    <h1>
        Tạo mới link youtube
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.news.index') }}">Link youtube</a></li>
        <li class="active">Tạo mới</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" id="form-create-youtube" action="{{ route('admin.youtube.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Link Youtube</label>
                            <input type="text" name="url" class="form-control" placeholder="Nhập link youtube">
                            <br>
                            <label style="color: red">* Chú ý nhập link theo định dạng - Ví dụ: https://www.youtube.com/embed/tbegIkZ4UzQ</label>
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
{!! JsValidator::formRequest('App\Http\Requests\CreateYoutubeRequest', '#form-create-youtube') !!}
@endsection