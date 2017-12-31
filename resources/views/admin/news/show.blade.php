@extends('admin.layout.master')
@section('title', 'Quản lý tin tức')
@section('content')
<section class="content-header">
    <h1>
        Chi tiết tin tức
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.news.index') }}">Tin tức</a></li>
        <li class="active">Chi tiết tin tức</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" id="form-update-news" action="{{ route('admin.news.update', $new->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name="title" value="{{ $new->title }}" class="form-control" placeholder="Nhập tiêu đề bài viết">
                        </div>
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="file" name="thumbnail"> 
                            <br>
                            <img src="{{ $new->thumbnail }}" border="0" width="200" align="center" />
                        </div>
                        <!-- wysiwyg -->
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="textarea" name="content" placeholder="Nhập nội dung bài viết">
                                {{ $new->content }}
                            </textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('admin.news.index') }}" class="btn btn-danger btn-sm">Thoát</a>
                        <button type="submit" class="btn btn-primary btn-sm">Sửa</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\UpdateNewsRequest', '#form-update-news') !!}
@endsection