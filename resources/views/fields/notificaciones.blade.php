@include('fields.direccionesnotif')
<div class="row">
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('correo', 'Correo electrónico', ['class' => 'col-form-label-sm']) !!}
			{!! Form::email('correo', null, ['class' => 'notificaciones form-control form-control-sm', 'placeholder' => 'Ingrese el correo electrónico', 'data-validation'=>'email,required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('telefonoN', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('telefonoN', null, ['class' => 'notificaciones form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono', 'data-validation'=>'number']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('fax', 'Fax', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('fax', null, ['class' => 'notificaciones form-control form-control-sm', 'placeholder' => 'Ingrese el fax','data-validation'=>'number']) !!}
		</div>
	</div>
</div>