@extends('frontend.layout.master-auth')
@section('title', 'Đăng ký')
@section('content')
<div class="register-box-body">
	<p class="login-box-msg">Đăng ký thành viên</p>
	<form action="{{ route('post.register') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
			<input type="text" class="form-control" name="name" placeholder="Tên người dùng" value="{{ old('name') }}">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
			<input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('name') }}">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
			<input type="password" class="form-control" name="password" placeholder="Mật khẩu">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			@if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
			<input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu">
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
			@if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
		</div>
		<div class="row">
			<div class="col-xs-8">
				<a href="{{ route('home.index') }}" class="text-center">Trang chủ</a><br>
				<a href="{{ route('get.login') }}" class="text-center">Bạn đã đăng ký tài khoản?</a>
			</div>
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
			</div>
		</div>
	</form>
</div>
@endsection
