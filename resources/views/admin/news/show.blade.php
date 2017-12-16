@extends('admin.layout.master')
@section('title', 'Manager User')
@section('content')
<section class="content-header">
    <h1>
        Create News
        <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">News</a></li>
        <li class="active">Create</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Example</h3>
                </div>
                <form role="form" action="{{ route('admin.news.update', $new->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name="title" value="{{ $new->title }}" class="form-control">
                        </div>
                        <!-- wysiwyg -->
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="textarea" name="content" placeholder="Place some text here" style="widt 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
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
<script>
    $(function () {
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5();
    })
</script>
@endsection