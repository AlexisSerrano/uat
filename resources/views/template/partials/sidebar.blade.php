<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="#" class="brand-link">
			<img src="{{ asset('img/logofge.png') }}" alt="Logo" class="brand-image " style="opacity: .8">
			{{-- <img src="{{ asset('img/logoblack.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
			<span class="brand-text font-weight-light">- UAT</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar font-weight-light">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="Imagen de perfil">
				</div>
				<div class="info">
					<a href="#" class="d-block">USUARIO</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
							 with font-awesome or any other icon font library -->
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-list"></i>
							<p>
								Preregistros
								<i class="right fa fa-angle-left"></i>
								
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{url('crear-caso')}}" class="nav-link">
									<i class="fa fa-plus nav-icon"></i>
									<p>Nuevo Registro</p>
								</a>
							</li>
							<li class="nav-item">
								<a href='{{url("registros")}}' class="nav-link">
										<i class="fa fa-pencil nav-icon"></i>
										<p>Consulta de preregistros</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item has-treeview menu-open">
						<a href="{{url('Traerturno')}}" class="nav-link active">
							<i class="nav-icon fa fa-check-circle-o"></i>
							<p>
								Tomar turno
							</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-search"></i>
							<p>
								Busquedas
								{{-- <i class="right fa fa-angle-left"></i> --}}
							</p>
						</a>
					</li>
					{{-- <li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-tree"></i>
							<p>
								UI Elements
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>General</p>
								</a>
							</li>
						</ul>
					</li> --}}
					<li class="nav-item has-treeview">
						<a href='{{route("cancelar.caso")}}' class="nav-link">
							<i class="nav-icon fa fa-ban"></i>
							<p>
								Cancelar registro
								{{-- <i class="fa fa-angle-left right"></i> --}}
							</p>
						</a>
						{{-- <ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>General Elements</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Advanced Elements</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Editors</p>
								</a>
							</li>
						</ul> --}}
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-user-times"></i>
							<p>
								Ausente
								{{-- <i class="fa fa-angle-left right"></i> --}}
							</p>
						</a>
						{{-- <ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Simple Tables</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Data Tables</p>
								</a>
							</li>
						</ul> --}}
					</li>
					<li class="nav-item has-treeview">
						<a href="{{url('atencion')}}" class="nav-link">
							{{-- <span class="bagde">{{countAtencion()}}</span> --}}
							<i class="nav-icon fa fa-user-times"></i>
							<p>
								Atencion rapida
								{{-- <i class="fa fa-angle-left right"></i> --}}
							</p>
						</a>
					</li>


					{{--
					<li class="nav-header">EXAMPLES</li>
					<li class="nav-item">
						<a href="pages/calendar.html" class="nav-link">
							<i class="nav-icon fa fa-calendar"></i>
							<p>
								Calendar
								<span class="badge badge-info right">2</span>
							</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-envelope-o"></i>
							<p>
								Mailbox
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="pages/mailbox/read-mail.html" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Read</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
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
					</li>
					--}}
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>
