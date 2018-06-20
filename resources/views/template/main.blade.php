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
	{{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
	<link rel="stylesheet" href="{{asset ('css/sweetalert.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.css') }}">
	<link rel="stylesheet" href="{{asset ('css/cssfonts.css')}}">
	<link rel="stylesheet" href="{{asset ('css/estilos.css')}}">
	
	<link rel="stylesheet" href="{{ asset('css/theme-jquery-validation.min.css') }}">
	<style>
		.brand-image {
			max-height: 40px;
		}
	</style>



	@yield('csss')
</head>

<body class="hold-transition sidebar-mini" onload="deshabilitaRetroceso()">
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
						<ol class="breadcrumb float-sm-right" id="breadcumb">
							@yield('navegacion')
							<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class=" nav-icon fa fa-home"></i> Inicio</a></li>
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
	
			</div><!--/. container-fluid -->
		</section>

		<!-- /.content -->	
	</div>
	
	@include('template.partials.footer')
</div>
<!-- ./wrapper -->

@routes
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js')}}" ></script>
<script src="{{ asset('js/bootstrap.min.js')}}" ></script>
<script src="{{asset ('js/sweetalert.min.js')}}"></script>

<script src="{{asset ('js/app.js')}}"></script>
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

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script> 

<script>
	$("input:text").focusout(function() {
        $(this).val($(this).val().toUpperCase());
	    });
	$("textarea").focusout(function() {
		$(this).val($(this).val().toUpperCase());
	});


	$('select').select2();

	
	function deshabilitaRetroceso(){
		window.location.hash="$";	
		window.location.hash="$+"; //chrome
		window.onhashchange=function(){window.location.hash="$";}
	}

	$('#botonCancelar').on('click', function(){
		this.preventDefault;
		console.log(numero);
		swal({
				title: "¿Seguro que desea cancelar el registro?",
				text: "No podrá deshacer este paso.",
				type: "warning",
				showCancelButton: true,
				cancelButtonText: "Cancelar",
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Confirmar",
				closeOnConfirm: false
		}, function(isConfirm){
			if (isConfirm) {
				window.location=route("cancelar.caso");
			}

		});
	});

	$('#botonDevolverturno').on('click', function(){
		this.preventDefault;
		elemento=this;
		numero=elemento.dataset.valordevolver;
		console.log(numero);
		swal({
				title: "¿Seguro que desea devolver el turno tomado?",
				text: "No podrá deshacer este paso.",
				type: "warning",
				showCancelButton: true,
				cancelButtonText: "Cancelar",
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Confirmar",
				closeOnConfirm: false
		}, function(isConfirm){
			if (isConfirm) {
				window.location=route('devolver', numero );
			}

		});
	});


</script>
@routes
@yield('pilaScripts')
@include('sweet::alert')
</body>
</html>
