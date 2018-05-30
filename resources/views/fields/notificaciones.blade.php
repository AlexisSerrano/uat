@include('fields.direccionesnotif')
@if (isset($preregistro))
<div class="row">
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('correo', 'Correo electrónico', ['class' => 'col-form-label-sm']) !!}
			{!! Form::email('correo', null, ['class' => 'notificaciones form-control form-control-sm', 'placeholder' => 'Ingrese el correo electrónico', 'data-validation'=>'email','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('telefonoN', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('telefonoN', $preregistro->telefono, ['class' => 'notificaciones form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono', 'data-validation'=>'custom','data-validation-optional'=>'true', 'data-validation'=>'number']) !!}
		</div>
	</div>
	{{-- <div class="col-4">
		<div class="form-group">
			{!! Form::label('fax', 'Fax', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('fax', null, ['class' => 'notificaciones form-control form-control-sm', 'placeholder' => 'Ingrese el fax','data-validation'=>'custom','data-validation-optional'=>'true','data-validation'=>'number']) !!}
		</div>
	</div> --}}
</div>
	
@else
	
<div class="row">
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('correo', 'Correo electrónico', ['class' => 'col-form-label-sm']) !!}
			{!! Form::email('correo', null, ['class' => 'notificaciones form-control form-control-sm', 'placeholder' => 'Ingrese el correo electrónico', 'data-validation'=>'email','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('telefonoN', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('telefonoN', null, ['class' => 'notificaciones form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono', 'data-validation'=>'custom','data-validation-optional'=>'true', 'data-validation'=>'number']) !!}
		</div>
	</div>
	{{-- <div class="col-4">
		<div class="form-group">
			{!! Form::label('fax', 'Fax', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('fax', null, ['class' => 'notificaciones form-control form-control-sm', 'placeholder' => 'Ingrese el fax','data-validation'=>'custom','data-validation-optional'=>'true','data-validation'=>'number']) !!}
		</div>
	</div> --}}
</div>
@endif