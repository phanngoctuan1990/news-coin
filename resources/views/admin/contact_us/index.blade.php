@extends('admin.layout.master')
@section('title', 'Quản lý hộp thư')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Hộp thư
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li class="active"><a href="{{ route('admin.contact-us.index') }}">Hộp thư</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <table id="contact-us" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên người liên hệ</th>
                                <th>Địa chỉ mail</th>
                                <th>Tiêu đề</th>
                                <th>Ngày gửi</th>
                                <th>Trạng thái</th>
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
