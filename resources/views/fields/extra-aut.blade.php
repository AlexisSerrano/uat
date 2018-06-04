<div class="row">
	@if(!empty($idCarpeta))
	{!! Form::hidden('idCarpeta', $idCarpeta) !!}
	@endif
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('antiguedad', 'Antigüedad (Años)', ['class' => 'col-form-label-sm']) !!}
			{!! Form::number('antiguedad', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la antigüedad','data-validation'=> 'required', 'min'=>'0']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('rango', 'Rango', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('rango', ['CABO' => 'CABO', 'COMANDANTE' => 'COMANDANTE'], null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione un rango','data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('horarioLaboral', 'Horario laboral', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('horarioLaboral', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el horario laboral', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-12">
		<div class="form-group">
			{!! Form::label('narracion', 'Descripción de hechos', ['class' => 'col-form-label-sm']) !!}
			{!! Form::textarea('narracion', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la descripción de los hechos', 'rows' => '5','data-validation'=>'length', 'data-validation-length'=>'min20']) !!}
		</div>
	</div>	
</div>