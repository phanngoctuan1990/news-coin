<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bitcoin | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{!! asset('assets/css/font-awesome.min.css') !!}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{!! asset('assets/css/ionicons.min.css') !!}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{!! asset('assets/css/AdminLTE.min.css') !!}">

    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Bit</b>Coin</a>
            </div>
            @include('flash::message')
            <!-- /.login-logo -->
            @yield('content')
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    </body>
</html>
