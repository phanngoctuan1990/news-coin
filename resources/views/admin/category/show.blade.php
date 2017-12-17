@extends('admin.layout.master')
@section('title', 'Quản lý thể loại coin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Chi tiết thể loại coin
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.category-coin.index') }}">Thể loại coin</a></li>
        <li class="active">Chi tiết thể loại coin</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
    <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" id="form-update-category-coin" action="{{ route('admin.category-coin.update', $category->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Nhập tên thể loại">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{ route('admin.category-coin.index') }}" class="btn btn-danger btn-sm">Thoát</a>
                        <button type="submit" class="btn btn-primary btn-sm">Sửa</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\UpdateCategoryRequest', '#form-update-category-coin') !!}
@endsection