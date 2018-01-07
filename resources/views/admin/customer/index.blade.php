@extends('admin.layout.master')
@section('title', 'Thành viên')
@section('content')
<section class="content-header">
    <h1>
        Tổng số thành viên đăng ký: {{ $totalCustomer }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.user.index') }}">Thành viên</a></li>
        <li class="active">Danh sách thành viên</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <table id="customer-list" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Ngày tham gia</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection