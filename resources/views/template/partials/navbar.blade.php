<nav class="main-header navbar navbar-expand border-bottom">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
		</li>
	</ul>

	<!-- SEARCH FORM -->
	@if (!is_null(session('terminada')))	
		<div style="color:white;margin-left:20px;">
			<span>
				Número de carpeta: 
				<strong>
					{{session('terminada')}}
				</strong>
			</span>
		</div>
	@endif

	@if (!is_null(session('numCarpeta')))	
		<div style="color:white;margin-left:20px;">
			<span>
				Número de carpeta: 
				<strong>
					{{session('numCarpeta')}}
				</strong>
			</span>
		</div>
	@endif
	
	@if (!is_null(session('preregistro')))	
		<div style="color:white;margin-left:20px;">
			<span>
				Folio de pre-registro: 
				<strong>
					{{session('foliopreregistro')}}
				</strong>
			</span>
		</div>
	@endif
	
	{{-- puede que se quite en el futuro --}}
	@if (isset($acta->folio)&&Request::path()=='atender-acta/'.$acta->id)	
		<div style="color:white;margin-left:20px;">
			<span>
				Folio de pre-registro: 
				<strong>
					{{$acta->folio}}
				</strong>
			</span>
		</div>
	@endif
		
	@if (isset($preregistro->folio)&&Request::path()=='registros/'.$preregistro->id.'/edit')	
		<div style="color:white;margin-left:20px;">
			<span>
				Folio de pre-registro: 
				<strong>
					{{$preregistro->folio}}
				</strong>
			</span>
		</div>
	@endif
	
	@if (isset($preregistro->folio)&&Request::path()=='predenuncias/'.$preregistro->id.'/edit')	
		<div style="color:white;margin-left:20px;">
			<span>
				Folio de pre-registro: 
				<strong>
					{{$preregistro->folio}}
				</strong>
			</span>
		</div>
	@endif
	
	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item" data-toggle="tooltip" data-placement="bottom">
			<span class="nav-link">{{session('unidad')}}</span>
		</li>
	</ul>
</nav>