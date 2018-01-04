@extends('admin.layout.master-login')
@section('content')
<div class="login-box-body">
    <p class="login-box-msg"></p>
    @include('flash::message')
    <form action="{{ url('admin/login') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <input id="email" type="email" class="form-control" name="email" placeholder="Email đăng nhập" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
            <input id="password" type="password" class="form-control" placeholder="Mật khẩu" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox">
                <label><input type="checkbox" value="remember"> Ghi nhớ</label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <!-- <a href="{{ url('/password/reset') }}">Bạn đã quên mật khẩu?</a><br> -->
</div>
@endsection
