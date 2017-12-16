@extends('admin.layout.master')
@section('title', 'Manager User')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách Users
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Admin</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">Danh sách users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="id-users" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
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