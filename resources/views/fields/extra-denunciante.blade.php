<div class="row">
	<div class="col-6">
		{{-- @if(!empty($idCarpeta))
		{!! Form::hidden('idCarpeta', $idCarpeta) !!}
		@endif
		<div class="form-group">
			<label class="col-form-label col-form-label-sm" for="conoceAlDenunciado">¿Conoce al denunciado?</label>
			<div class="clearfix"></div>
			<div class="form-check form-check-inline">
				<label class="form-check-label col-form-label col-form-label-sm">
					<input class="form-check-input" type="radio" id="conoceAlDenunciado1" name="conoceAlDenunciado" value="1" required> Sí
				</label>
			</div>
			<div class="form-check form-check-inline">
				<label class="form-check-label col-form-label col-form-label-sm">
					<input class="form-check-input" type="radio" id="conoceAlDenunciado2" name="conoceAlDenunciado" value="0"> No
				</label>
			</div>
		</div> --}}
		<div class="form-group">
			{!! Form::label('reguardarIdentidad', 'Identidad resguardada', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('reguardarIdentidad', [ 0 => 'No',1 => 'Si'], 0, ['class' => 'form-control form-control-sm', 'data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-6">
		<div class="form-group">
			{!! Form::label('victima', 'Tipo de solicitante', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('victima', [1 => 'Victima', 0 => 'Ofendido'], 1, ['class' => 'form-control form-control-sm', 'data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-12">
		<div class="form-group">
			{!! Form::label('narracion', 'Descripción de hechos', ['class' => 'col-form-label-sm']) !!}
			@isset($preregistro)
				{!! Form::textarea('narracion', $preregistro->narracion, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la descripción de los hechos', 'rows' => '5', 'data-validation'=> 'required,length','data-validation-length'=>'10-5000']) !!}
			@else	
				{!! Form::textarea('narracion', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la descripcón de los hechos', 'rows' => '5', 'data-validation'=> 'required,length','data-validation-length'=>'10-5000']) !!}
			@endisset
		</div>
	</div>
</div