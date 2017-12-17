@extends('admin.layout.master')
@section('title', 'Quản lý tài khoản')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Chi tiết tài khoản
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.user.index') }}">Tài khoản</a></li>
        <li class="active">Chi tiết tài khoản</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" id="form-update-user" action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="fullName">Tên</label>
                            <input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control" id="id-inputName" placeholder="Nhập tên">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="id-inputEmail" placeholder="Nhập email">
                        </div>
                        @if(auth()->user()->id == $user->id)
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="id-inputPassword1" placeholder="Nhập password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Nhập lại Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="id-inputPassword2" placeholder="Nhập password">
                        </div>
                        @endif
                        <?php
                            $userRoles = [];
                            foreach ($user->userRoles as $value) {
                                $userRoles[] = $value['role_id'];
                            }
                        ?>
                        <div class="form-group checkbox">
                            <label class="cls-checkbox">
                                <input name="role_id[]" type="checkbox" value="{{ App\Models\Role::POST_NEWS }}" {{in_array(App\Models\Role::POST_NEWS, $userRoles) ? 'checked': ''}}> Đăng bài viết
                            </label>
                            <label class="cls-checkbox">
                                <input name="role_id[]" type="checkbox" value="{{ App\Models\Role::REVIEW_NEWS }}" {{in_array(App\Models\Role::REVIEW_NEWS, $userRoles) ? 'checked': ''}}> Review bài viết
                            </label>
                            <label class="cls-checkbox">
                                <input name="role_id[]" type="checkbox" value="{{ App\Models\Role::POST_COIN }}" {{in_array(App\Models\Role::POST_COIN, $userRoles) ? 'checked': ''}}> Đăng coin
                            </label>
                            <label class="cls-checkbox">
                                <input name="role_id[]" type="checkbox" value="{{ App\Models\Role::REVIEW_COIN }}" {{in_array(App\Models\Role::REVIEW_COIN, $userRoles) ? 'checked': ''}}> Review coin
                            </label>
                        </div>
                        <div class="box-footer">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-danger btn-sm">Thoát</a>
                            @if(auth()->user()->is_admin || auth()->user()->id == $user->id)
                            <button type="submit" class="btn btn-primary btn-sm">Sửa</button>
                            @endif
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\UpdateUserRequest', '#form-update-user') !!}
@endsection
