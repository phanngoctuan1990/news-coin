@extends('admin.layout.master')
@section('title', 'Manager News')
@section('content')
<section class="content-header">
    <h1>
        Bài viết
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Admin</a></li>
        <li><a href="#">Bài viết</a></li>
        <li class="active">Chi tiết bài viết</li>
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
                        <!-- wysiwyg -->
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="textarea" name="content" placeholder="Nhập nội dung bài viết" style="widt 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
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
<script>
    $(function () {
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5();
    })
</script>
@endsection