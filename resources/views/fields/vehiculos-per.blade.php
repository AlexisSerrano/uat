{!! Form::open(['route' => 'store.vehiculo', 'method' => 'POST'])  !!} 
<div class="row">
{{-- 	
		<div class="col-4">
				<div class="form-group">
					{!! Form::label('nombretve', 'Nombre', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('nombretve', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre',  'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'Nombre debe contener al menos dos letras']) !!}
				</div>
			</div>
			<div class="col-4">
					<div class="form-group">
						{!! Form::label('primerAp4', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
						{!! Form::text('primerAp4', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido',  'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'El apellido debe contener al menos dos letras']) !!}
					</div>
				</div>
				<div class="col-4">
					<div class="form-group">
						{!! Form::label('segundoAp4', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
						{!! Form::text('segundoAp4', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
					</div>
				</div> --}}
				<div class="col-4">
                    <div class="form-group">
                        {!! Form::label('victima3', 'Víctima/Ofendido', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::select('victima3', $victimas,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                    </div>
            </div>		
		<div class="col-4">
				<div class="form-group">
					{!! Form::label('marcav', 'Marca', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('marcav', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese marca del vehículo',  'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'La marca debe contener al menos dos letras']) !!}
				</div>
			</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('lineav', 'Línea', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('lineav', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese línea del vehículo',  'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'La linea del vehículo debe contener al menos dos letras']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('modelov', 'Modelo', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('modelov', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese modelo del vehículo (año).', 'data-validation'=>'number']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('colorv', 'Color', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('colorv', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese color del vehículo', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('numeroseriev', 'Número de serie ', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numeroseriev', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el número de serie', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('lugarFabvt', 'Lugar de fabricación del motor', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('lugarFabv', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese lugar de fabricación', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('placav', 'Placas de circulación', ['class' => 'col-form-label-sm']) !!}		
			{!! Form::text('placav', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese número de placas', 'data-validation'=>'required']) !!}   
		</div>
	</div>

	<div class="col-4">
		<div class="form-group">
			{!! Form::label('celularv', 'Número de celular', ['class' => 'col-form-label-sm']) !!}		
			{!! Form::text('celularv', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese su número de celular ', 'data-validation'=>'number']) !!}   
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('calle2', 'Calle', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('calle2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle', 'data-validation'=>'required']) !!}
		</div>
	</div>
	
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numExterno2', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numExterno2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Exterior', 'data-validation'=>'required']) !!}
		</div>
	</div>
	
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numInterno2', 'Número interior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numInterno2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Interior', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idEstado2', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstado2', $estados, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required']) !!}
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idMunicipio2', 'Municipio', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catMunicipios'], $form['idMunicipio2']))
			{!! Form::select('idMunicipio2',  $form['catMunicipios'], $form['idMunicipio2'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
			@else
			{!! Form::select('idMunicipio2', [''=>'Seleccione un municipio'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
			@endif
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idLocalidad2', 'Localidad', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catLocalidades'],$form['idLocalidad2']))
			{!! Form::select('idLocalidad2',  $form['catLocalidades'], $form['idLocalidad2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
			@else
			{!! Form::select('idLocalidad2', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
			@endif
		</div>
	</div>
	
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('idColonia2', 'Colonia', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catColonias'],$form['idColonia2']))
			{!! Form::select('idColonia2', $form['catColonias'], $form['idColonia2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
			@else
			{!! Form::select('idColonia2', ['' => 'colonia'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
			@endif
		</div>
	</div>
	
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('cp2', 'Código postal', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catCodigoPostal'],$form['cp2']))
			{!! Form::select('cp2', $form['catCodigoPostal'], $form['cp2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
			@else
			{!! Form::select('cp2', ['' => 'Seleccione CP'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
			@endif
		</div>
	</div>

	<div class="col-4">
			<div class="form-group">
			{!! Form::label('fecha_nac', 'Fecha de elaboración', ['class' => 'col-form-label-sm']) !!}
				<div class="input-group date" id="fecha_nac" data-target-input="nearest">
					@if(isset($form['fecha_nac']))
					<input type="date" id="fecha_nac" name="fecha_nac" value="{{ $form['fecha_nac'] }}" class="form-control form-control-sm", data-validation="required">
					@else
					<input type="date" id="fecha_nac" name="fecha_nac" class="form-control form-control-sm", data-validation="required">
					@endif
				</div>
			</div>
		</div>
	
</div>
<div class="col text-right">
		{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarPericiales'))!!}
		
</div>
{!! Form::close() !!}