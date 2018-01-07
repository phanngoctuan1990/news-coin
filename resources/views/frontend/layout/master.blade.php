<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Idautu.net</title>
        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="{!! asset('assets/css/owl.carousel.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/owl.theme.default.css') !!}">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="{!! asset('assets/css/magnific-popup.css') !!}">
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{!! asset('assets/css/font-awesome.min.css') !!}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{!! asset('assets/css/dataTables.bootstrap.min.css') !!}">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
    </head>

    <body>
        <!-- Header -->
        @include('frontend.layout.partials.header')
        <!-- Content -->
        @yield('content')
        
        <!-- Footer -->
        @include('frontend.layout.partials.footer')
        <!-- jQuery -->
        <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
        <!-- Bootstrap -->
        <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
        <!-- Owl Carousel -->
        <script src="{!! asset('assets/js/owl.carousel.min.js') !!}"></script>
        <!-- Magnific Popup -->
        <script src="{!! asset('assets/js/jquery.magnific-popup.js') !!}"></script>
        <!-- DataTables -->
        <script src="{!! asset('assets/js/jquery.dataTables.min.js') !!}"></script>
        <script src="{!! asset('assets/js/dataTables.bootstrap.min.js') !!}"></script>
        <!-- Page script -->
        <script src="{!! asset('assets/js/home.js') !!}"></script>
        <script src="{!! asset('assets/js/home-page.js') !!}"></script>
        @yield('script')
    </body>
</html>
