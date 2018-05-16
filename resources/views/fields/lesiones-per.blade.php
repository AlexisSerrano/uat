{!! Form::open(['route' => 'store.lesiones', 'method' => 'POST'])  !!} 
<div class="row">
	<div class="col-6">
		<div class="form-group">
			{!! Form::label('nombre2', 'Nombre', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
			{!! Form::text('nombre2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}
			<div class="help-block with-errors"></div> 
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

		
	<div class="col text-right">
		{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarPericiales'))!!}
		
</div>
</div>
{!! Form::close() !!}