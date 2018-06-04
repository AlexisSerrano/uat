
{{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="#" class="brand-link">
			<img src="{{ asset('img/logofge.png') }}" alt="Logo" class="brand-image " style="opacity: .8">
			{{-- <img src="{{ asset('img/logoblack.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
			{{-- <span class="brand-text font-weight-light"></span>
		</a>  --}}

		<aside class="main-sidebar  elevation-4 barra-izquierda " id="barra">
			<!-- Brand Logo -->
			<a href="predenuncias" class="brand-link">
			<!--<a href="index3.html" class="brand-link">-->
                {{-- <img src="https://rawcdn.githack.com/Romaincks/assets/master/img/logo-150px-FGE.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" --}}
				<img src="{{asset('img/escudo.png')}}" alt="AdminLTE Logo" height="" class="brand-image img-circle elevation-3"
				style="opacity: .8">
				<span class="brand-text font-weight-light">FGE | Veracruz</span>
			</a>

		<!-- Sidebar -->
		<div class="sidebar font-weight-light ">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image" style="margin-top:auto;margin-bottom:auto;">				
					{{-- <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="Imagen de perfil" > --}}
					<i class="fa fa-user-circle" aria-hidden="true" style="color:white; font-size:33px;"></i> 
				</div>
				<div class="info" style="padding-top:0;width: 100%;text-align: center;">
					<a href="#" class="d-block">{{ Auth::user()->nombres }}</a>
					<a href="#" class="d-block">{{ Auth::user()->apellidos }}</a>
					<span style="color:white;font-size:13px;">Número de Fiscal: {{Auth::user()->numFiscal}}</span>
				</div>
			</div>
			
			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					@if (is_null(session('carpeta')))
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-users"></i>
							<p>
								Pre-registros
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{url('preregistro')}}" class="nav-link {{ Request::is( 'preregistro') ? 'active' : '' }}">
										<i class="fa fa-user-plus nav-icon"></i>
										<p>Nuevo pre-registro</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='{{url("registros")}}' class="nav-link {{ Request::is( 'registros') ? 'active' : '' }}">
											<i class="fa fa-pencil nav-icon"></i>
											<p>Consulta de pre-registros</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link ">
									<i class="nav-icon fa fa-user-o"></i>
									<p>
										Recepción
										<i class="right fa fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item has-treeview  ">
										<a href="{{url('predenuncias')}}" class="nav-link {{ Request::is( 'predenuncias') ? 'active' : '' }}">
												{{-- <i class="nav-icon fa fa-user-times"></i> --}}
												<p>
													Todos los registros
												</p>
											</a>
										</li>
										<li class="nav-item has-treeview">
											<a href="{{url('encola')}}" class="nav-link {{ Request::is( 'encola') ? 'active' : '' }}">
													{{-- <i class="nav-icon fa fa-user-times"></i> --}}
													<p>
														Registros en cola
													</p>
												</a>
											</li>
											<li class="nav-item has-treeview">
												<a href="{{url('urgentes')}}" class="nav-link {{ Request::is( 'urgentes') ? 'active' : '' }}">
														{{-- <i class="nav-icon fa fa-user-times"></i> --}}
														<p>
															Urgentes
														</p>
													</a>
												</li>
												{{-- <li class="nav-item has-treeview">
													<a href="{{url('encola')}}" class="nav-link {{ Request::is( 'encola') ? 'active' : '' }}">
														<i class="nav-icon fa fa-user-times"></i>
														<p>Ausentes</p>
													</a>
												</li> --}}
												<li class="nav-item has-treeview">
													<a href="{{url('recepcionista')}}" class="nav-link {{ Request::is( 'recepcionista') ? 'active' : '' }}">
															{{-- <i class="nav-icon fa fa-user-times"></i> --}}
															<p>
																Agregar
															</p>
														</a>
													</li>
													<li class="nav-item has-treeview">
														<a href="{{route('disponibilidad.fiscal')}}" class="nav-link {{ Request::is( 'turnos-pruebas') ? 'active' : '' }}">
																{{-- <i class="nav-icon  fa fa-print"></i> --}}
																<p>Turnos tomados</p>
															</a>
														</li>
													</ul>
												</li>
												{{-- menu-open --}}
												<li class="nav-item has-treeview ">
													<a href="{{url('Traerturno')}}" class="nav-link">
															<i class="nav-icon fa fa-check-circle-o"></i>
															<p>
																Tomar turno
							</p>
						</a>
					</li>
					@endif
					@if (!is_null(session('carpeta')))

						@if(!is_null(session('preregistro')))
						<li class="nav-item has-treeview">
							<a href="{{route('devolver', session('preregistro') )}}" class="nav-link">
								<i class="nav-icon fa fa-reply"></i>
								<p>
									Devolver turno
								</p>
							</a>
						</li>
						@else
							@if (is_null(session('terminada')))
								<li class="nav-item has-treeview">
									<a href='{{route("cancelar.caso")}}' class="nav-link">
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
						<li class="nav-item has-treeview">
							<a href="{{url('crear-caso')}}" class="nav-link {{ Request::is( 'crear-caso') ? 'active' : '' }}">
								<i class="fa fa-folder-open nav-icon"></i>
								<p>Nuevo caso</p>
							</a>
						</li>
						
					@endif
					
					@if (is_null(session('terminada'))&&is_null(session('carpeta')))
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
					
					<li class="nav-item has-treeview">
						<a href="{{route('actaspendientes')}}" class="nav-link {{ Request::is( 'actas-pendientes') ? 'active' : '' }}">
							<i class="nav-icon  fa fa-file-text-o"></i>
							<p>Actas de hechos</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
							<a href="{{route('actaspendientes')}}" class="nav-link {{ Request::is( 'actacircunstanciada') ? 'active' : '' }}">
								<i class="nav-icon  fa fa-file-text"></i>
								<p>Actas circunstanciales</p>
							</a>
						</li>
					<li class="nav-item has-treeview ">
						<a href="{{url('carpetas')}}" class="nav-link {{ Request::is( 'carpetas') ? 'active' : '' }}">
							<i class="nav-icon  fa fa-archive"></i>
							<p>Carpetas</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="{{url('libro')}}" class="nav-link {{ Request::is( 'libro') ? 'active' : '' }}">
							<i class="nav-icon  fa fa-book"></i>
							<p>Libro de gobierno</p>
						</a>
					</li>
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
					
					@endif
					<li class="nav-item has-treeview">
						<a href="{{url('getOficios')}}" class="nav-link {{ Request::is( 'getOficios') ? 'active' : '' }}">
							<i class="nav-icon fa fa-font"></i>
							<p>Oficios</p>
						</a>
					</li>
					
					<li class="nav-item has-treeview">
						<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();" >
							<i class="nav-icon fa fa-power-off"></i>
							<p>Cerrar sesión</p>
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
					
				</li>
					


					
					{{-- <li class="nav-header">EXTRAS</li>
			
					{{-- <li class="nav-item has-treeview">--}}
						{{-- <a href="#" class="nav-link"> --}}
								{{-- {!! Form::button( array('class' => 'btn btn-secondary borrar ','data-toggle'=>'tooltip','title'=>'Borrar Campos','id' => 'btn-reset')) !!} --}}
							{{-- <i class="nav-icon fa fa-eraser "></i>
							
						</a> 
					</li> --}} 
					{{-- <li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-book"></i>
							<p>
								Pages
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="pages/examples/login.html" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Login</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/register.html" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Register</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/lockscreen.html" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Lockscreen</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-plus-square-o"></i>
							<p>
								Extras
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="pages/examples/404.html" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Error 404</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/500.html" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Error 500</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/blank.html" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Blank Page</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="starter.html" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Starter Page</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-header">MISCELLANEOUS</li>
					<li class="nav-item">
						<a href="https://adminlte.io/docs" class="nav-link">
							<i class="nav-icon fa fa-file"></i>
							<p>Documentation</p>
						</a>
					</li>
					<li class="nav-header">LABELS</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-circle-o text-danger"></i>
							<p class="text">Important</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-circle-o text-warning"></i>
							<p>Warning</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-circle-o text-info"></i>
							<p>Informational</p>
						</a>
					</li> --}}
				
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>
