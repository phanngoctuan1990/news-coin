
<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
	</head>
	
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<!-- Header -->
			@include('admin.layout.partials.header')

			<!-- Sidebar -->
		  	@include('admin.layout.partials.sidebar')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
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
		<!-- DataTables -->
		<script src="{!! asset('assets/js/jquery.dataTables.min.js') !!}"></script>
		<script src="{!! asset('assets/js/dataTables.bootstrap.min.js') !!}"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="{!! asset('assets/js/bootstrap3-wysihtml5.all.min.js') !!}"></script>
		<!-- Slimscroll -->
		<script src="{!! asset('assets/js/jquery.slimscroll.min.js') !!}"></script>
		<!-- FastClick -->
		<script src="{!! asset('assets/js/fastclick.js') !!}"></script>
		<!-- AdminLTE App -->
		<script src="{!! asset('assets/js/adminlte.min.js') !!}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{!! asset('assets/js/demo.js') !!}"></script>
		<!-- page script -->
		@yield('script')
	</body>
</html>
