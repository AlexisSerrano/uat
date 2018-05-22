<div class="row">
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('nombresC', 'Nombre', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('nombresC', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre', 'data-validation'=>'custom' ,'data-validation' =>'length','data-validation-length' =>'min2', 'data-validation-error-msg'=>'Nombre debe contener al menos dos letras','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('primerApC', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('primerApC', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido', 'data-validation'=>'custom' ,'data-validation' =>'length','data-validation-length' =>'min2', 'data-validation-error-msg'=>'Primer apellido debe contener al menos dos letras','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('segundoApC', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('segundoApC', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido', 'data-validation'=>'custom' ,'data-validation' =>'length','data-validation-length' =>'min2', 'data-validation-error-msg'=>'Segundo apellido debe contener al menos dos letras','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('aliasC', 'Alias', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('aliasC', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el alias',  'data-validation'=>'custom' ,'data-validation' =>'length','data-validation-length' =>'min2', 'data-validation-error-msg'=>'Alias debe contener al menos dos letras','data-validation-optional'=>'true','required']) !!}
		</div>
	</div>
</div>
@include('fields.dir-conocido')
<div class="row">
	<div class="col-12">
		<div class="form-group">
			{!! Form::label('senasParticC', 'Señas particulares', ['class' => 'col-form-label-sm']) !!}
			{!! Form::textarea('senasParticC', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese las señas particulares','rows' => '3','data-validation'=>'custom', 'data-validation'=>'length', 'data-validation-length'=>'min10','data-validation-error-msg'=>'Las señas particulasres debe contener al menos 10 caracteres']) !!}
		</div>
	</div>
</div>