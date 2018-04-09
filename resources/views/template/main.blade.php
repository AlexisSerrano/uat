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

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('admin/plugins/font-awesome/css/font-awesome.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	{{-- SweetAlert --}}
    <link rel="stylesheet" href="{{asset ('css/sweetalert.css')}}">
	<!-- TimePicker style -->
		<link rel="stylesheet" href="{{ asset('CSS/bootstrap-datepicker.min.css') }}">

	@stack('csss')
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
						<h1 class="m-0 text-dark">@yield('title', 'Inicio')</h1>
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
				@yield('content')
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
	@include('template.partials.sidebar2')
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
	@include('template.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
{{-- <script src="{{ asset('admin/dist/js/demo.js') }}"></script> --}}

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
<script src="{{ asset('admin/dist/js/pages/dashboard2.js') }}"></script>

{{-- SweetAlert --}}
<script src="{{asset ('js/sweetalert.min.js')}}"></script>

{{-- TimePicker --}}
<script src="{{asset ('js/bootstrap-datepicker.min.js')}}"></script>

{{-- Google Maps --}}
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEg9FTRwRH0bfUVa_bP5QUOe-hHJM6LHM&libraries=places&sensor=false"></script>

@stack('scripts')
@include('sweet::alert')
</body>
</html>
