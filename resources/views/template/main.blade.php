<!DOCTYPE html>
<html ang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>FGE-UAT | @yield('title', 'Inicio')</title>
	<link rel="icon" href="{{ asset('img/logo.png') }}">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
	
	{{-- estilos --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="{{asset ('css/sweetalert.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.css') }}">
	<link rel="stylesheet" href="{{asset ('css/cssfonts.css')}}">
	<link rel="stylesheet" href="{{asset ('css/estilos.css')}}">
	<link rel="stylesheet" href="{{ asset('css/theme-jquery-validation.min.css') }}">
	



	@yield('csss')
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
	<!-- Navbar -->
	@include('template.partials.navbar')
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	@include('template.partials.sidebar')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h5 class="m-0 text-dark">@yield('title', '')</h5>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							@yield('navegacion')
							<li class="breadcrumb-item active">@yield('title')</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				
				@yield('contenido')
				{{--
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h5 class="card-title">@yield('title', 'Inicio')</h5>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								@yield('card-content')
							</div>
							<!-- ./card-body -->
							<div class="card-footer">
								@yield('card-foot')
							</div>
							<!-- /.card-footer -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
				--}}
			</div><!--/. container-fluid -->
		</section>

		<!-- /.content -->	
	</div>
	<!-- /.content-wrapper -->

	<!-- Control Sidebar (a secondary optional sidebar) -->
	{{-- @include('template.partials.sidebar2') --}}
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
	@include('template.partials.footer')
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js')}}" ></script>
<script src="{{ asset('js/bootstrap.min.js')}}" ></script>
<script src="{{asset ('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('plugins/select2/select2.min.js')}}" ></script>
<script src="{{ asset('js/jquery.form-validator.min.js')}}" ></script>

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="{{ asset('admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jVectorMap -->
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('admin/plugins/chartjs/Chart.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
{{-- <script src="{{ asset('admin/dist/js/pages/dashboard2.js') }}"></script> --}}



{{-- TimePicker --}}
{{-- <script src="{{asset ('js/bootstrap-datepicker.min.js')}}"></script> --}}
{{-- Google Maps --}}
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEg9FTRwRH0bfUVa_bP5QUOe-hHJM6LHM&libraries=places&sensor=false"></script> --}}

<script>
	$("input:text").keyup(function() {
        $(this).val($(this).val().toUpperCase());
	    });
	$("textarea").keyup(function() {
		$(this).val($(this).val().toUpperCase());S
	});


	$('select').select2();


</script>
@yield('pilaScripts')
@include('sweet::alert')
</body>
</html>
