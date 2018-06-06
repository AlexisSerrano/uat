{!! Form::open(['route' => 'store.agregar', 'method' => 'POST'])  !!} 
<div class="row">
	

	<div class="col-4">
			<div class="form-group">
				{!! Form::label('victima', 'Víctima/Ofendido', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('victima', $victimas,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
			</div>
	</div>		
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('marcat', 'Marca del teléfono', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('marcat', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Marca',  'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'La marca del teléfono debe contener al menos dos letras']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('imeit', 'IMEI', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('imeit', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el IMEI', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('compat', 'Compañia teléfonica', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('compat', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese la compañia', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('numerot', 'Número ', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numerot', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el primer número', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('numero2t', 'Número destino', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numero2t', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el número destino', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
		{!! Form::label('fechamen', 'Fecha de elaboración', ['class' => 'col-form-label-sm']) !!}
			<div class="input-group date" id="fechamen" data-target-input="nearest">
				@if(isset($form['fechamen']))
				<input type="date" id="fechamen" name="fechamen" value="{{ $form['fechamen'] }}" class="form-control form-control-sm", data-validation="required">
				@else
				<input type="date" id="fechamen" name="fechamen" class="form-control form-control-sm", data-validation="required">
				@endif
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="form-group">
			{!! Form::label('narraciont', 'Narración', ['class' => 'col-form-label-sm']) !!}		
			<textarea name="narraciont" id="narraciont" cols="15" rows="5" class="form-control form-control-sm", data-validation= "required"></textarea>    
		</div>
	</div>

	<div class="col text-right">
		{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarPericiales'))!!}
		
</div>
</div>
{!! Form::close() !!}