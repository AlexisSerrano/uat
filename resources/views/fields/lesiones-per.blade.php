{!! Form::open(['route' => 'store.lesiones', 'method' => 'POST'])  !!} 
<div class="row">
	{{-- <div class="col-4">
		<div class="form-group">
			{!! Form::label('nombrele', 'Nombre', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
			{!! Form::text('nombrele', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}
			<div class="help-block with-errors"></div> 
		</div>
	</div>
	<div class="col-4">
			<div class="form-group">
				{!! Form::label('primerAp5', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('primerAp5', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido',  'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'El primer apellido tiene que tener minimo 2 letras']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('segundoAp5', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('segundoAp5', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
			</div>
		</div> --}}
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('victima4', 'Víctima/Ofendido', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('victima4', $victimas,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
			</div>
	</div>		
		
	<div class="col-4">
			<div class="form-group">
			{!! Form::label('fecha_nac', 'Fecha de realización', ['class' => 'col-form-label-sm']) !!}
				<div class="input-group date" id="fecha_nac" data-target-input="nearest">
					@if(isset($form['fecha_nac']))
					<input type="date" id="fecha_nac" name="fecha_nac" value="{{ $form['fecha_nac'] }}" class="form-control form-control-sm",data-validation="required" >
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