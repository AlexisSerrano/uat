{!! Form::open(['route' => 'store.lesiones', 'method' => 'POST'])  !!} 
<div class="row">
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('nombre2', 'Nombre', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
			{!! Form::text('nombre2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}
			<div class="help-block with-errors"></div> 
		</div>
	</div>
	<div class="col-4">
			<div class="form-group">
				{!! Form::label('primerAp', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('primerAp', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese apellido',  'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'La marca del teléfono debe contener al menos dos letras']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('segundoAp', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('segundoAp', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese apellido', 'data-validation'=>'required']) !!}
			</div>
		</div>
		
	<div class="col-4">
			<div class="form-group">
			{!! Form::label('fecha_nac', 'Fecha de realizacion', ['class' => 'col-form-label-sm']) !!}
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