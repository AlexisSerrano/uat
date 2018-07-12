
<aside class="main-sidebar  elevation-4 barra-izquierda collapsado" id="barra">
	<!-- Brand Logo -->
	<a href="{{url('home')}}" class="brand-link">
		<img src="{{asset('img/escudo.png')}}" alt="FGELogo" height="" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">FGE | Veracruz</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar font-weight-light ">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex" style="margin-bottom: -15px !important;margin-top: 3px !important;">
			<div class="image" style="margin-top:auto;margin-bottom:auto;">				
				{{-- <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="Imagen de perfil" > --}}
				<i class="fa fa-user-circle" aria-hidden="true" style="color:white; font-size:33px;"></i> 
			</div>
			
			<div class="info" style="padding-top:0;width: 100%;text-align: center;">
				<a href="#" class="d-block">{{ Auth::user()->nombres }}</a>
				<a href="#" class="d-block">{{ Auth::user()->apellidos }}</a>
				@if (Auth::user()->grupo!='coordinador')
				<span style="color:white;font-size:13px;">Número de Fiscal: {{Auth::user()->numFiscal}}</span>
				@endif
			</div>
			
		</div>
		<div class="user-panel mt-3 pb-3 mb-3 d-flex" style="margin-bottom: -15px !important;margin-top: 3px !important;">
			<div class="info" style="padding-top:0;padding-bottom:0;width: 100%;text-align: center;">
				@if (Auth::user()->grupo=='recepcion')
					<span style="color:white;font-size:15px;">Recepción</span>
				@endif
				@if (Auth::user()->grupo=='orientador')
					<span style="color:white;font-size:15px;">Fiscal orientador</span>
				@endif
				@if (Auth::user()->grupo=='facilitador')
					<span style="color:white;font-size:15px;">Fiscal facilitador</span>
				@endif
				@if (Auth::user()->grupo=='coordinador')
					<span style="color:white;font-size:15px;">Fiscal coordinador</span>
				@endif
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				@if (is_null(session('carpeta')))
					@if (Auth::user()->grupo=='orientador')
					
						<li class="nav-item">
							<a href='{{url("registros")}}' class="nav-link {{ Request::is( 'registros') ? 'active' : '' }}">
								<i class="nav-icon fa fa-users"></i>
								<p>Pre-registros</p>
							</a>
						</li>
				
						{{-- <li class="nav-item has-treeview  {{ Request::is( 'registros') ? 'menu-open' : '' }}">
							<a href="#" class="nav-link ">
								<i class="nav-icon fa fa-users"></i>
								<p>
									Pre-registros
									<i class="right fa fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="{{url('preregistro')}}" class="nav-link {{ Request::is( 'preregistro') ? 'active' : '' }}">
											<i class="nav-icon fa fa-angle-right "></i>
										<p>Nuevo pre-registro</p>
									</a>
								</li>

								<li class="nav-item">
									<a href='{{url("registros")}}' class="nav-link {{ Request::is( 'registros') ? 'active' : '' }}">
											<i class="nav-icon fa fa-angle-right "></i>
										<p>Consulta de pre-registros</p>
									</a>
								</li>
							</ul>
						</li> --}}
					@endif

					@if (Auth::user()->grupo=='recepcion')
						{{-- <li class="nav-item has-treeview">
							<a href="#" class="nav-link ">
								<i class="nav-icon fa fa-user-o"></i>
								<p>
									Recepción
									<i class="right fa fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview"> --}}
								<li class="nav-item has-treeview  ">
									<a href="{{route('predenuncias.index')}}" class="nav-link {{ Request::is( 'predenuncias') ? 'active' : '' }}">
											<i class="nav-icon fa fa-angle-right "></i>
										<p>
											Todos los registros
										</p>
									</a>
								</li>
									
								<li class="nav-item has-treeview">
									<a href="{{url('encola')}}" class="nav-link {{ Request::is( 'encola') ? 'active' : '' }}">
											<i class="nav-icon fa fa-angle-right "></i>
										<p>
											Registros en cola
										</p>
									</a>
								</li>
										
								<li class="nav-item has-treeview">
									<a href="{{url('urgentes')}}" class="nav-link {{ Request::is( 'urgentes') ? 'active' : '' }}">
											<i class="nav-icon fa fa-angle-right "></i>
										<p>
											Urgentes
										</p>
									</a>
								</li>
								
								<li class="nav-item has-treeview">
									<a href="{{url('recepcionista')}}" class="nav-link {{ Request::is( 'recepcionista') ? 'active' : '' }}">
										<i class="nav-icon fa fa-angle-right "></i>
										<p>
											Agregar pre-registro	
										</p>
									</a>
								</li>
					@endif
					@if (Auth::user()->grupo=='coordinador')
									
								<li class="nav-item has-treeview">
									<a href="{{route('disponibilidad.fiscal')}}" class="nav-link {{ Request::is( 'turnos-pruebas') ? 'active' : '' }}">
											<i class="nav-icon fa fa-angle-right "></i>
										<p>Turnos tomados</p>
									</a>
								</li>
					@endif
								{{-- </ul>
						</li> --}}
					
					@if (Auth::user()->grupo=='orientador')
					
						<li class="nav-item has-treeview ">
							<a href="{{url('Traerturno')}}" class="nav-link">
								<i class="nav-icon fa fa-check-circle-o"></i>
								<p>
									Tomar turno
								</p>
							</a>
						</li>
					@endif
				@endif

				@if (!is_null(session('carpeta')))

					@if(!is_null(session('preregistro')))
						<li class="nav-item has-treeview">
							{{-- <a href="{{route('devolver', session('preregistro') )}}" id="botonDevolverturno" class="nav-link"> --}}
							<a href="#" id="botonDevolverturno" class="nav-link" data-valorDevolver="{{session('preregistro')}}">
								<i class="nav-icon fa fa-reply"></i>
								<p>
									Devolver turno
								</p>
							</a>
						</li>
					@else
				
						@if (is_null(session('terminada')))
							<li class="nav-item has-treeview">
								{{-- <a href='{{route("cancelar.caso")}}' class="nav-link"> --}}
								<a href='#' onclick="cancelarCaso" id="botonCancelar" va class="nav-link">
									<i class="nav-icon fa fa-ban"></i>
									<p>
										Cancelar registro
									</p>
								</a>
							</li>
						@else
							<li class="nav-item has-treeview">
								<a href='{{route("salir.caso")}}' class="nav-link">
									<i class="nav-icon fa fa-backward"></i>
									<p>
										Salir
									</p>
								</a>
							</li>		
							<li class="nav-item has-treeview">
								<a href='{{route("carpeta.detalle")}}' class="nav-link">
									<i class="nav-icon fa fa-share"></i>
									<p>
										Regresar a detalle
									</p>
								</a>
							</li>		
						@endif	
					@endif

					@if (is_null(session('terminada')))
						
						<li class="nav-item has-treeview">
							<a href='{{route("new.denunciante")}}' class="nav-link {{ Request::is( 'agregar-denunciante') ? 'active' : '' }}">
								<i class="nav-icon fa fa-share"></i>
								<p>
									Reanudar registro
								</p>
							</a>
						</li>
					@endif
				
				@else
					@if (Auth::user()->grupo=='orientador')
						
					
					<li class="nav-item has-treeview">
						<a href="{{url('crear-caso')}}" class="nav-link {{ Request::is( 'crear-caso') ? 'active' : '' }}">
							<i class="fa fa-address-card nav-icon"></i>
							<p>Nuevo caso</p>
						</a>
					</li>
					@endif
				@endif
				
				@if (is_null(session('terminada'))&&is_null(session('carpeta')))
					
					
					@if (Auth::user()->grupo=='recepcion')
						<li class="nav-item has-treeview">
							<a href="{{url('atencion')}}" class="nav-link {{ Request::is( 'atencion') ? 'active' : '' }}">
							{{-- <span class="bagde">{{countAtencion()}}</span> --}}
								<i class="nav-icon  fa fa-clock-o"></i>
								<p>
									Atención rápida
									<span class="badge badge-info right">{{countAtencion()}}</span>
								</p>
							</a>
						</li>
					@endif
					
					@if (Auth::user()->grupo=='orientador')
					
						<li class="nav-item has-treeview active {{ Request::is( 'actas-pendientes') ? 'menu-open' : '' }}">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-file-text"></i>
								<p>
									Actas
									<i class="right fa fa-angle-left"></i>
								</p>
							</a>
						<ul class="nav nav-treeview">
							<li class="nav-item has-treeview">
								<a href="{{route('actaspendientes')}}" class="nav-link {{ Request::is( 'actas-pendientes') ? 'active' : '' }}">
										<i class="nav-icon  fa fa-angle-right"></i>
										<p>Actas de hechos</p>
									</a>
							</li>
						@endif
						
						@if (Auth::user()->grupo=='orientador')
							
							<li class="nav-item has-treeview">
								<a href="{{route('new.actacircunstanciada')}}" class="nav-link {{ Request::is( 'actacircunstanciada') ? 'active' : '' }}">
										<i class="nav-icon  fa fa-angle-right"></i>
										<p>Actas circunstanciales</p>
									</a>
								</li>
							</ul>
					</li>
							@endif
				
					@if (Auth::user()->grupo=='orientador')
					<li class="nav-item has-treeview {{ Request::is('carpetas') ? 'menu-open' : '' }}">
						<a href="#" class="nav-link ">
							<i class="nav-icon fa fa-archive"></i>
							<p>
								Carpetas
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						
						<ul class="nav nav-treeview">
							@if (Auth::user()->grupo=='orientador')
								<li class="nav-item has-treeview ">
									<a href="{{route('indexcarpetas')}}" class="nav-link {{ Request::is( 'carpetas') ? 'active' : '' }}">
										<i class="nav-icon  fa fa-angle-right"></i>
										<p>Carpetas terminadas</p>
									</a>
								</li>
							@endif
							@endif
							@if (Auth::user()->grupo=='coordinador')
								<li class="nav-item has-treeview ">
									<a href="{{route('indexcarpetas')}}" class="nav-link {{ Request::is( 'carpetas') ? 'active' : '' }}">
										<i class="nav-icon  fa fa-angle-right"></i>
										<p>Carpetas de la unidad</p>
									</a>
								</li>
							@endif
							@if (Auth::user()->grupo=='orientador')
							<li class="nav-item has-treeview ">
								<a href="{{route('carpetas.reserva')}}" class="nav-link {{ Request::is( 'carpetasReserva') ? 'active' : '' }}">
									<i class="nav-icon  fa fa-angle-right"></i>
									<p>Carpetas en reserva</p>
								</a>
							</li>
						</ul>
					</li>
					@endif
					@if (Auth::user()->grupo=='coordinador')
						<li class="nav-item has-treeview">
							<a href="{{url('libro')}}" class="nav-link {{ Request::is( 'libro') ? 'active' : '' }}">
								<i class="nav-icon  fa fa-book"></i>
								<p>Libro de gobierno</p>
							</a>
						</li>
					@endif
					@if (Auth::user()->grupo=='coordinador')
						<li class="nav-item has-treeview">
							<a href="{{url('libro-acta')}}" class="nav-link {{ Request::is( 'libro-acta') ? 'active' : '' }}">
								<i class="nav-icon  fa fa-book"></i>
								<p>Libro de actas circunstanciales</p>
							</a>
						</li>
					@endif		
				@endif		
				
				@if (!is_null(session('carpeta'))&&!is_null(session('terminada')))
					<li class="nav-item has-treeview">
						<a href="{{url('periciales')}}" class="nav-link {{ Request::is( 'periciales') ? 'active' : '' }}">
							<i class="nav-icon  fa fa-files-o"></i>
							<p>Periciales</p>
						</a>
					</li>
				
					<li class="nav-item has-treeview">
						<a href="{{url('medidas')}}" class="nav-link {{ Request::is( 'medidas') ? 'active' : '' }}">
							<i class="nav-icon fa fa-plus-square"></i>
							<p>Medidas de protección</p>
						</a>
					</li>
				
					<li class="nav-item has-treeview">
						<a href="{{ route('turnar.carpeta')}}" class="nav-link {{ Request::is('turnar') ? 'active' : '' }}">
							<i class="nav-icon fa fa-folder-open-o"></i>
							<p>Estado de la Carpeta</p>
						</a>
					</li>
				
				@endif
				
				@if (is_null(session('carpeta'))&&is_null(session('terminada')))
					<li class="nav-item has-treeview">
						<a href="{{url('getOficios')}}" class="nav-link {{ Request::is( 'getOficios') ? 'active' : '' }}">
							<i class="nav-icon fa fa-font"></i>
							<p>Crear Oficios Nuevos</p>
						</a>
					</li>
					
					{{-- @if (Auth::user()->grupo=='orientador')
						<li class="nav-item has-treeview">
							<a href="{{route('cambioRol')}}" class="nav-link">
								<i class="nav-icon fa fa-exchange"></i>
								<p>Cambiar a Recepción</p>
							</a>
						</li>
					@endif
					
					@if (Auth::user()->grupo=='recepcion')				
						<li class="nav-item has-treeview">
							<a href="{{route('cambioRol')}}" class="nav-link">
								<i class="nav-icon fa fa-exchange"></i>
								<p>Cambiar a Fiscal</p>
							</a>
						</li>
						@endif --}}
						{{-- <button type="button" class="nav-link" data-toggle="modal" data-target="#modalRol"> --}}
					<li class="nav-item has-treeview">
						{{-- <a href="{{route('cambioRol')}}" class="nav-link"> --}}
						<a href="#" onclick="mostrarModal()" class="nav-link">
							<i class="nav-icon fa fa-exchange"></i>
							<p>Cambiar de rol</p>
						</a>
					</li>
					{{-- </button> --}}
				@endif

				<li class="nav-item has-treeview">
					<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
						<i class="nav-icon fa fa-power-off"></i>
						<p>Cerrar sesión</p>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
				
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
