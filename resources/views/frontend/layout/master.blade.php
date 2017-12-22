<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap-fe.min.css') !!}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{!! asset('assets/css/dataTables.bootstrap4.min.css') !!}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{!! asset('assets/css/shop-homepage.css') !!}">
  </head>

  <body>
  		<!-- Header -->
        @include('frontend.layout.partials.header')
	    <!-- Page Content -->
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-9">
	        	<!-- Main slide -->
				@include('frontend.layout.partials.main-slide')
	          	<div class="row">
	          		@yield('content')
	          	</div>
	        </div>
	        <!-- Sidebar -->
        	@include('frontend.layout.partials.sidebar')
	      </div>
	    </div>
	    <!-- Footer -->
	    @include('frontend.layout.partials.footer')
	    <!-- jQuery -->
	    <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
	    <!-- DataTables -->
	    <script src="{!! asset('assets/js/jquery.dataTables4.min.js') !!}"></script>
	    <script src="{!! asset('assets/js/dataTables.bootstrap4.min.js') !!}"></script>

	    <!-- Page script -->
        <script src="{!! asset('assets/js/home.js') !!}"></script>
	    @yield('script')
  	</body>
</html>
