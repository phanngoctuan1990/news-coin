@extends('admin.layout.master')
@section('title', 'Quản trị viên')
@section('content')
<section class="content-header">
    <h1>
        Danh sách quản trị viên
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.user.index') }}">Quản trị viên</a></li>
        <li class="active">Danh sách quản trị viên</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <table id="id-users" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên</th>
                                <th>Email</th>
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