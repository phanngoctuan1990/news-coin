@extends('admin.layout.master')
@section('title', 'Quản trị viên')
@section('content')
<section class="content-header">
    <h1>
        Tạo quản trị viên
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.user.index') }}">Quản trị viên</a></li>
        <li class="active">Tạo quản trị viên</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" id="form-create-user" action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="fullName">Tên</label>
                            <input type="text" name="full_name" class="form-control" id="id-inputName" placeholder="Nhập tên">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="id-inputEmail" placeholder="Nhập email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="id-inputPassword1" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Nhập lại mật khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control" id="id-inputPassword2" placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="form-group checkbox">
                            <label class="cls-checkbox">
                                <input name="role_id[]" type="checkbox" value="{{ App\Models\Role::POST_NEWS }}"> Đăng bài viết
                            </label>
                            <label class="cls-checkbox">
                                <input name="role_id[]" type="checkbox" value="{{ App\Models\Role::REVIEW_NEWS }}"> Review bài viết
                            </label >
                            <label class="cls-checkbox">
                                <input name="role_id[]" type="checkbox" value="{{ App\Models\Role::POST_COIN }}"> Đăng coin
                            </label>
                            <label class="cls-checkbox">
                                <input name="role_id[]" type="checkbox" value="{{ App\Models\Role::REVIEW_COIN }}"> Review coin
                            </label>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo mới</button>
                        </div>
                </form>
            </div>
    </div>
</section>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\CreateUserRequest', '#form-create-user') !!}
@endsection
