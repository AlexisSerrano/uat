@extends('template.form')
@section('content') 
@section('title','Medidas de protección')
@include('fields.errores')
{!!Form::open(['route' => 'addMedidas', 'id'=>'form'])!!}

 @include('fields.buttons-navegacion')
 @include('fields.botonborrar')
 <br>



<div class="card-body boxone">
        <div class="col">
        <DIV class="row">
            
            <div class="col-12">
                <div class="form-group">
                    {!! Form::label('tipoProvidencia', 'Tipo de providencia precautoria', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::select('tipoProvidencia', $providencias ,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                </div>
            </div>
            <div class="col">
                    <div class="form-group">
                        {!! Form::label('quienEjecuta', 'Quién ejecuta', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::select('quienEjecuta', $ejecutores ,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                    </div>
            </div>
            <div class="col">
                    <div class="form-group">
                        {!! Form::label('victima', 'Víctima/Ofendido', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::select('victima', $victimas,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                    </div>
            </div>

            <div class="col">
            <div class="form-group">
                {!! Form::label('fechaInicio', 'Fecha inicial', ['class' => 'col-form-label-sm']) !!}
                    <div class="input-group date" id="fechaInicio" data-target-input="nearest">
                        {{-- {!! Form::text('fechaInicio', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechaInicio','data-validation'=>'required', 'placeholder' => 'DD/MM/AAAA']) !!} --}}

                                <input type="date" id="fechaInicio" name="fechaInicio" class="form-control form-control-sm">
                            {{-- <div class="group-text"><i class="fa fa-calendar"></i></div> --}}
                        </div>
                    </div>
                </div>
            <div class="col">
                <div class="form-group">
                {!! Form::label('fechaFinal', 'Fecha final', ['class' => 'col-form-label-sm']) !!}
                    <div class="input-group date" id="fechaFinal" data-target-input="nearest">
                        {{-- {!! Form::text('fechaFinal', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechaFinal','data-validation'=>'required', 'placeholder' => 'DD/MM/AAAA']) !!} --}}
                    
                                <input type="date" id="fechaFinal" name="fechaFinal" class="form-control form-control-sm" >
                            {{-- <div class="group-text"><i class="fa fa-calendar"></i></div> --}}
                        
                    </div>
                </div>
            </div>
        </div>
            <div class="col-12">
            <div class="form-group">
                {!! Form::label('ObservacionesM', 'Observaciones', ['class' => 'col-form-label-sm']) !!}		
                <textarea name="ObservacionesM" id="ObservacionesM" cols="15" rows="5" class="form-control form-control-sm", data-validation= "required"></textarea>    
            </div>
            <div class="col text-right">
                    {!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarMedidas'))!!}
            </div>
        </div>
    </div>
</div>  




    <!--tabla providencias precautorias y/o protección-->
        {{-- @include('tables.medidasP') --}}
         @include('tables.Medidas')
@endsection

@section('css')
	
@endsection

@push('scripts')

@endpush