@extends('frontend.layout.master-auth')
@section('title', 'Đăng nhập')
@section('content')
<div class="login-box-body">
    <p class="login-box-msg">Đăng nhập</p>
    @include('flash::message')
    <form action="{{ route('post.login') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <input id="email" type="email" class="form-control" name="email" placeholder="Email đăng nhập" value="{{ old('email') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
            <input id="password" type="password" class="form-control" placeholder="Mật khẩu" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="row">
            <div class="col-xs-8">
                <a href="{{ route('home.index') }}" class="text-center">Trang chủ</a><br>
                <a href="{{ route('get.register') }}" class="text-center">Đăng ký thành viên mới</a>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
            </div>
        </div>
    </form>
</div>
@endsection
