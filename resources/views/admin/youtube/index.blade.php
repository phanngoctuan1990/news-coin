@extends('admin.layout.master')
@section('title', 'Quản lý link youtube')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách link youtube
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.youtube.index') }}">Link youtube</a></li>
        <li class="active">Danh sách link youtube</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <table id="youtube" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Url</th>
                                <th>Ngày tạo</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection