@extends('admin.layout.master')
@section('title', 'Quản lý tin tức')
@section('content')
<section class="content-header">
    <h1>
        Tạo tin tức
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.news.index') }}">Tin tức</a></li>
        <li class="active">Tạo tin tức</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" id="form-create-news" action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề bài viết">
                        </div>
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="file" name="thumbnail">
                        </div>
                        <!-- wysiwyg -->
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="textarea" name="content" placeholder="Nhập nội dung bài viết" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
{!! JsValidator::formRequest('App\Http\Requests\CreateNewsRequest', '#form-create-news') !!}
<script>
    $(function () {
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5();
    })
</script>
@endsection