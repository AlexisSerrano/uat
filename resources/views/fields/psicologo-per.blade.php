{!! Form::open(['route' => 'store.psicologo', 'method' => 'POST'])  !!} 
<div class="row">
	
		<div class="col-4">
				<div class="form-group">
					{!! Form::label('nombrep', 'Nombre', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('nombrep', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el Nombre',  'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'Nombre debe contener al menos dos letras']) !!}
				</div>
			</div>
	{{-- <div class="col-4">
		<div class="form-group">
			{!! Form::label('marcat', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('marcat', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese apellido',  'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'La marca del teléfono debe contener al menos dos letras']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('imeit', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('imeit', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese apellido', 'data-validation'=>'required']) !!}
		</div>
	</div> --}}
	{{-- <div class="col-4">
		<div class="form-group">
			{!! Form::label('compat', 'Compañia Teléfonica', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('compat', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese la Compañia', 'data-validation'=>'required']) !!}
		</div>
	</div> --}}
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('numerop', 'Número de teléfono', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numerop', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese número de teléfono', 'data-validation'=>'required']) !!}
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
		{!! Form::label('fecha_nac', 'Fecha de realizacion', ['class' => 'col-form-label-sm']) !!}
			<div class="input-group date" id="fecha_nac" data-target-input="nearest">
				@if(isset($form['fecha_nac']))
				<input type="date" id="fecha_nac" name="fecha_nac" value="{{ $form['fecha_nac'] }}" class="form-control form-control-sm", data-validation="birthdate">
				@else
				<input type="date" id="fecha_nac" name="fecha_nac" class="form-control form-control-sm", data-validation="birthdate">
				@endif
			</div>
		</div>
	</div>
	{{-- <div class="col-4">
		<div class="form-group">
			{!! Form::label('numero2t', 'Número Destino', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numero2t', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el Número Destino', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-12">
		<div class="form-group">
			{!! Form::label('narraciont', 'Narración', ['class' => 'col-form-label-sm']) !!}		
			<textarea name="narraciont" id="narraciont" cols="15" rows="5" class="form-control form-control-sm", data-validation= "required"></textarea>    
		</div>
	</div> --}}
	
</div>
<div class="col text-right">
	{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarPsicologo'))!!}
	
</div>
</div> 
{!! Form::close() !!}