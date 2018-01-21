<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
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
        <!-- DataTables -->
        <link rel="stylesheet" href="{!! asset('assets/css/dataTables.bootstrap.min.css') !!}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{!! asset('assets/css/bootstrap3-wysihtml5.min.css') !!}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{!! asset('assets/css/_all-skins.min.css') !!}">
        <!-- jvectormap -->
        <!--Customize css-->
        <link rel="stylesheet" href="{!! asset('assets/css/main.css') !!}">
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Header -->
            @include('admin.layout.partials.header')

            <!-- Sidebar -->
            @include('admin.layout.partials.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @include('flash::message')
                @yield('content')
            </div>

            <!-- Footer -->
            @include('admin.layout.partials.footer')

            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        <!-- DataTables -->
        <script src="{!! asset('assets/js/jquery.dataTables.min.js') !!}"></script>
        <script src="{!! asset('assets/js/dataTables.bootstrap.min.js') !!}"></script>
        <!-- bootstrap datepicker -->
        <script src="{!! asset('assets/js/bootstrap-datepicker.min.js') !!}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{!! asset('assets/js/bootstrap3-wysihtml5.all.min.js') !!}"></script>
        <!-- Slimscroll -->
        <script src="{!! asset('assets/js/jquery.slimscroll.min.js') !!}"></script>
        <!-- FastClick -->
        <script src="{!! asset('assets/js/fastclick.js') !!}"></script>
        <!-- Box confirm -->
        <script src="{!! asset('assets/js/bootbox.min.js') !!}"></script>
        <!-- AdminLTE App -->
        <script src="{!! asset('assets/js/adminlte.min.js') !!}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{!! asset('assets/js/demo.js') !!}"></script>

        <!-- Page script -->
        <script src="{!! asset('assets/js/main.js') !!}"></script>
        <script src="{!! asset('assets/js/news.js') !!}"></script>
        <script src="{!! asset('assets/js/coin.js') !!}"></script>
        <script src="{!! asset('assets/js/user.js') !!}"></script>
        <script src="{!! asset('assets/js/customer.js') !!}"></script>
        <script src="{!! asset('assets/js/category-coin.js') !!}"></script>
        <script src="{!! asset('assets/js/contact-us.js') !!}"></script>
        <script src="{!! asset('assets/js/banner.js') !!}"></script>
        <script src="{!! asset('assets/js/youtube.js') !!}"></script>
        <!-- Tinymce -->
        <script src="{!! asset('assets/js/tinymce/js/tinymce/jquery.tinymce.min.js') !!}"></script>
        <script src="{!! asset('assets/js/tinymce/js/tinymce/tinymce.min.js') !!}"></script>
        <!-- page script -->
        @yield('script')
    </body>
</html>
