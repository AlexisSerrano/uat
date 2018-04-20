@extends('template.form')

@section('title', 'Actas de hechos')
@section('content')
    {!! Form::open([])  !!}
<div class="row no-gutters">
    <div class="col-12">
        <div class="boxtwo">
            <div class="row" id="actas">
                {{-- DATOS DE TODO TIPO DE ACTAS --}}
                @include('fields.actas')
            </div>


            <div class="form-group">
                <div class="col-12">
                    <div class="col">
                        <label for="narracion" class="col-form-label-sm">Narración</label>
                        @if(isset($form['narracion']))
                            {{ Form::textarea('narracion', $form['narracion'], ['class' => 'form-control form-control-sm', 'size' => '30x10', 'required']) }}
                        @else
                            {{ Form::textarea('narracion', null, ['class' => 'form-control form-control-sm', 'size' => '30x10', 'required']) }}
                        @endif
                        {{-- <textarea name="narracion" id="narracion" cols="30" rows="10" class="form-control form-control-sm" required=>
                            @if(isset($form['narracion']))
                                {{$form['narracion']}}
                            @endif
                        </textarea> --}}
                    </div>
                </div>
            </div>
            <div class="row menu">	
                <div class="col text-right">
                    {!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarActa'))!!}
                </div>
            </div>
            
        </div>
    </div>
</div>
	{!! Form::close() !!}
	
@endsection


@push('scripts')
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
$(document).ready(function(){
    $(function () {
			$('#fechanac').datetimepicker({
				format: 'YYYY-MM-DD',
            	minDate: moment().subtract(150, 'years').format('YYYY-MM-DD'),
            	maxDate: moment().subtract(18, 'years').format('YYYY-MM-DD')
			});
		});


});
</script>