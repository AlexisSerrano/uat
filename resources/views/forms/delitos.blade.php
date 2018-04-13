@extends('template.form')

@section('content')
  
@include('fields.buttons-navegacion')


<div class="box box-default "> 
	<div class="box-body">  
	    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Catalogo de delitos</div>
                    <div class="card-body boxone">
                            <div class="boxtwo">
								{!!Form::open(['route' => 'store.delito'])!!}
								<div class="col-4">
									<p class="col-form-label-sm">¿Con violencia?</p>
									<div class="form-group">
										<div class="form-check form-check-inline">
											<label class="form-check-label col-form-label-sm">
												<input class="form-check-input" type="radio" id="conViolencia1" name="conViolencia" id="no" value="0" checked required>
												No
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label col-form-label-sm">
												<input class="form-check-input" type="radio" id="conViolencia2" name="conViolencia" id="si" value="1">
												Sí
											</label>
										</div>
									</div>
								</div>

<div class="col-md-12">
<div class="card">
<div class="card-body boxone">
		<div class="row">	
				<div class="col-8">
						<div class="form-group">
					 {!! Form::label('idDelito', 'Seleccione el delito:', ['class' => 'col-form-label-sm']) !!}
					 {!! Form::select('idDelito', $delits, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione un delito', 'required']) !!}
						
                              
				</div>
				</div>
				
				<div class="col-6">
						<div class="form-group">
							{!! Form::label('fecha', 'Fecha', ['class' => 'col-form-label-sm']) !!}
							<div class="input-group date" id="fechaDelito" data-target-input="nearest">
								{!! Form::text('fecha', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechaDelito','data-validation'=>'required', 'placeholder' => 'DD/MM/AAAA']) !!}
								<div class="input-group-append" data-target="#fechaDelito" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6">
							<div class="form-group">
								{!! Form::label('hora', 'Hora', ['class' => 'col-form-label-sm']) !!}
								<div class="input-group date" id="horaDelito" data-target-input="nearest">
									{!! Form::text('hora', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'dat-target' => '#horaDelito','data-validation'=>'required', 'placeholder' => '00:00']) !!}
									<div class="input-group-append" data-target="#horaDelito" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-clock-o"></i></div>
									</div>
								</div>
							</div>
						</div>
			</div>
	
</div>
</div>


	
	<div class="card">
		<div class="card-header">Dirección donde se llevó a cabo el delito</div>
		<div class="card-body boxone">
			
						<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('idEstado', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
										{!! Form::select('idEstado', $estados, null ,['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('idMunicipio', 'Municipio', ['class' => 'col-form-label-sm']) !!}
										{!! Form::select('idMunicipio', ['' => 'Seleccione un municipio'],null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('idLocalidad', 'Localidad', ['class' => 'col-form-label-sm']) !!}
										{!! Form::select('idLocalidad', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
									</div>
								</div>
								<div class="col-md-4">
										<div class="form-group">
											{!! Form::label('cp', 'Código Postal', ['class' => 'col-form-label-sm']) !!}
											{!! Form::select('cp', ['' => 'Seleccione un código postal'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
										</div>
									</div>
								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('idColonia', 'Colonia', ['class' => 'col-form-label-sm']) !!}
										{!! Form::select('idColonia', ['' => 'Seleccione una colonia'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
									</div>
								</div>
								<div class="col-md-6">
										<div class="form-group">
											{!! Form::label('idLugar', 'Lugar', ['class' => 'col-form-label-sm']) !!}
											{!! Form::select('idLugar', $lugares, null ,['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione lugar de los hechos','data-validation'=>'required']) !!}
										</div>
									</div>
									<div class="col-md-6">
											<div class="form-group">
												{!! Form::label('idZona', 'Zona', ['class' => 'col-form-label-sm']) !!}
												{!! Form::select('idZona', $zonas, null ,['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una zona','data-validation'=>'required']) !!}
											</div>
										</div>
								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('calle', 'Calle', ['class' => 'col-form-label-sm']) !!}
										{!! Form::text('calle',null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle','data-validation'=>'length', 'data-validation-length'=>'5-100']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('numExterno', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
										{!! Form::text('numExterno',null, ['class' => 'form-control form-control-sm','placeholder' => 'Ingrese el número exterior','data-validation'=>'custom', 'data-validation-regexp'=>'^([A-Z]|[-]|[\d]){1,10}$']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('numInterno', 'Número interior', ['class' => 'col-form-label-sm']) !!}
										{!! Form::text('numInterno',null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior','data-validation'=>'custom', 'data-validation-regexp'=>'^([A-Z]|[-]|[\d]){1,10}$']) !!}
									</div>
								</div>
							</div>
							
				
		</div>
	</div>


</div>

<br>

<div class="col text-right">
		
		{!!Form::submit('Guardar',array('class' => 'btn button1','id'=>'guardarDelito'))!!}
		
</div>
		

                           

                            </div>

							@include('tables.delitos')
  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!!Form::close()!!}

@endsection
@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@endsection

@section('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
	
<script>
	$(function () {
			$('#fechaDelito').datetimepicker({
				format: 'YYYY-MM-DD',
            	// minDate: moment().subtract(150, 'years').format('YYYY-MM-DD'),
            	// maxDate: moment().subtract(18, 'years').format('YYYY-MM-DD')
			
			});
		});

	$(function () {
        $('#horaDelito').datetimepicker({
           format: 'LT',
		 
           maxDate: moment()
		  
       });
    });
</script>
@endsection