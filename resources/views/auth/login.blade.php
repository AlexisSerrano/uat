
{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


{{-- @extends('template.main') --}}
<script src="{{ asset('plugins/cookie/js.cookie.min.js')}}" ></script>
<script type="text/javascript">
Cookies.remove('isLiveC');
//localStorage.clear();
localStorage.removeItem('isLiveLocal');
sessionStorage.removeItem('isLive');
</script>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UNIDAD DE ATENCIÓN TEMPRANA</title>
	<link rel="icon" href="{{ asset('img/iconofge.png') }}">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">--}}
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{asset ('admin/dist/css/adminlte.css')}}">
	<link rel="stylesheet" href="{{ asset('css/cssfonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box rounded">
		<div class="card-body arriba rounded-top">
			<a id="login-logo" ><img src="{{ asset('img/logo-fge-svg.svg') }}" alt=""></a>
		</div>
		<!-- /.login-logo -->
		<div id="cuadro" class="card-body login-card-body abajo rounded-bottom">
			<div id='formulario'>
				<form method="POST" action="{{ route('login') }}" id="login-form">
					{{ csrf_field() }}
					<input type="hidden" id="email" name="email" value="">
					<input type="hidden" id="vpassword" name="password" value="">

					<div id="usuario" class="form-row align-items-center">
                                 {{-- <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text" id="btnGroupAddon">@</div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                  </div>
                                 --}}
                        
                        <div class="col form-group has-feedback input-group row{{ $errors->has('password') ? ' has-error' : '' }} inputrow">
                                <div class=" input-group-text mb-2" id="btnGroupAddon"><i class="fa fa-user fa-lg"></i></div>
                                <input type="text" class="form-control mb-2 usuario" id="name" name="name" placeholder="Usuario">
                           
						
                        </div>
                        
						{{-- <div class="col form-group has-feedback">
							<label class="sr-only" for="inlineFormInputGroup" style="white">Username</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div id="dominio" class="input-group-text rounded">@fiscaliaveracruz.gob.mx</div>
								</div>
							</div>
                        </div> --}}
                        
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
                    </div>
                    
					<div class="form-group has-feedback row{{ $errors->has('password') ? ' has-error' : '' }} inputrow">
						<input id="txtPassword" type="text" class="form-control password"   placeholder="Contraseña" >
						<label class="fa fa-lock fa-lg" for="password" ></label>
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col-12 ">
							<button id="iniciar" type="submit" class="btn btn-primary btn-block btn-flat rounded">Entrar</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
            </div>
            
			<div id="cargando" style="display:none;">
				<div class="text-center">
					<strong  style="color:#f5f5f5;">Inciando sesión<strong>
				</div>
				<div class="sk-circle">
					<div class="sk-circle1 sk-child"></div>
					<div class="sk-circle2 sk-child"></div>
					<div class="sk-circle3 sk-child"></div>
					<div class="sk-circle4 sk-child"></div>
					<div class="sk-circle5 sk-child"></div>
					<div class="sk-circle6 sk-child"></div>
					<div class="sk-circle7 sk-child"></div>
					<div class="sk-circle8 sk-child"></div>
					<div class="sk-circle9 sk-child"></div>
					<div class="sk-circle10 sk-child"></div>
					<div class="sk-circle11 sk-child"></div>
					<div class="sk-circle12 sk-child"></div>
				</div>
			</div>
	    </div>
		<!-- /.login-card-body -->

	</div>

	<script src="{{ asset('js/jquery-3.2.1.min.js')}}" ></script>
	<script src="{{ asset('js/popper.min.js')}}" ></script>
	<script src="{{ asset('js/bootstrap.min.js')}}" ></script>
	<script src="{{ asset('js/jquery.disableAutoFill.min.js')}}" ></script>
	<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

	<script type="text/javascript">
	function borrarlsc(){
		Cookies.remove('isLiveC');
		localStorage.clear();
		sessionStorage.removeItem('isLive');
	}

	$(document).ready(function() {
		$("#name").focusout(function() {
			$("#email").val($(this).val()+"@fiscaliaveracruz.gob.mx".toLowerCase());
		});
		$('#login-form').disableAutoFill({
			passwordFiled: '.password'
		});
		$('#login-form').submit(function(e) {
			$("#vpassword").val($("#txtPassword").val());
			$("#txtPassword").val("");
			$("#txtPassword").attr("type", "text");
			$("#txtPassword").remove();
			$('#formulario').hide();
			$('#cargando').show();
			//e.preventDefault();
		});
		$('input').keypress(function (e) {
		  if (e.which == 13){
		   $('#iniciar').trigger('click');
		  }
		});

	});

</script>

@yield('scripts')
@include('sweet::alert')
</body>
</html>
