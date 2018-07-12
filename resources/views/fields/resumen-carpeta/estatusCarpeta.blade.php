@extends('template.form')

@section('title', 'Estado de la carpeta')
@section('css')
<style>
	.btn-success{
		background: black;
	}	
</style>
	
@endsection
@section('content')
@include('fields.errores')

<div class="card">
    <div class="card-header" style="text-align:right;">
        <a href="{{route('carpeta.detalle')}}" class="btn btn-secondary" >Resumen de la carpeta</a>    
        <a href="{{route('historial.carpeta')}}" class="btn btn-secondary" >Historial de la carpeta</a>    
        {{-- <button class="btn btn-secondary">Resumen de la carpeta</button> --}}
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-12">
                
                {!!  Form::open(['route' => 'estado.edit', 'method' => 'post', 'id'=>'form'])!!}
                <input type="hidden" name="idCarpeta" value="{{$estatus[0]->id}}">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('estatusCarpeta', 'Estatus de la carpeta:', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::text('estatusCarpeta', $estatus[0]->estatus, ['class' => 'form-control form-control-sm','readonly']) !!}
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('cambioEstatus', 'Cambiar a:', ['class' => 'col-form-label-sm']) !!}
                            {{-- {!! Form::select('cambioEstatus', ['' => 'Seleccione un estatus'], $informacion, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!} --}}
                            {!! Form::select('EstadoCarpeta', $informacion, null, ['class' => 'form-control form-control-sm',"id"=>'EstadoCarpeta' ,'placeholder' => 'Seleccione un estatus','data-validation'=>'required']) !!}
                        </div>                        
                    </div>
                    
                    <div class="col-12" id="determinacion">
                        
                        <div class="form-group">
                            {!! Form::label('selectDetermina', 'Tipo de determinaci&oacute;n:', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::select('selectDetermina', $tipoDeterminacion, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione un estatus','data-validation'=>'required']) !!}
                        </div>
                        
                    </div>
                    <div class="col-12" id="archivo">
                        
                        <div class="form-group">
                            {!! Form::label('selectArchivo', 'Tipo de archivo:', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::select('selectArchivo', $tipoArchivo, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione un estatus','data-validation'=>'required']) !!}
                        </div>
                        
                    </div>

                    <div class="col-6" id="unidad">
                        <div class=""></div>
                        <div class="form-group">
                            {!! Form::label('selectUnidad', 'Unidad:', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::select('selectUnidad', $unidad, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una unidad','data-validation'=>'required','id'=>'selectUnidad']) !!}
                        </div>

                        
                        
                    </div>
                    <div class="col-6" id="fiscal">
                    <div class="form-group">
                            {!! Form::label('selectFiscal', 'Fiscal:', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::select('selectFiscal', ['placeholder'=>'Seleccione un fiscal'], null, ['class' => 'form-control form-control-sm select2', 'required','id'=>'selectFiscal']) !!}
                        </div> 
                    </div>
                    {{-- <div class="col-12" id="archivo">
                        
                        <div class="form-group">
                            {!! Form::label('asignarFiscal', 'Asignar a fiscal:', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::text('asignarFiscal', 'SIN INFORMACIÓN', ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        
                    </div> --}}
                    
                </div>
                
                <div class="row" id="observacion">
                    <div class="col-12">
                        <label for="narracion" class="col-form-label-sm">Observaciones</label>
                        {{ Form::textarea('narracion',null, ['class' => 'form-control form-control-sm', 'size' => '30x10' , 'data-validation'=>'length', 'data-validation-length'=>'10-5000']) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">   
                        <br>
                        <div class="text-right">
                            {{-- <a href="{{route('indexcarpetas')}}" title="" class="btn btn-secondary">Cancelar</a> --}}
                            {!!Form::submit('Guardar',array('class' => 'btn btn-primary'))!!}
                        </div>
                    </div>
                </div>
                
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
<script>
    $(document).ready(function(){
        // var selectEstatus=$("#EstadoCarpeta");
        $('#determinacion').hide();
        $('#archivo').hide();
        $('#unidad').hide();
        $('#fiscal').hide();
        $('#observacion').hide();
        
        //campos del formulario
        $('#selectDetermina').prop('disabled', true);
        $('#selectArchivo').prop('disabled', true);
        $('#selectUnidad').prop('disabled', true);
        $('#narracion').prop('disabled', true);
        
        $("#EstadoCarpeta").bind("change",function(){
            valor = $(this).val();
            // console.log(valor);
            switch (valor) {
                case "1":
                    $('#determinacion').hide();
                    $('#archivo').hide();
                    $('#observacion').show();
                    $('#selectDetermina').prop('disabled', true);
                    $('#selectArchivo').prop('disabled', true);
                    $('#narracion').prop('disabled', false);
                    $("#unidad").hide();
                    $("#fiscal").hide();
                    $('#selectUnidad').prop('disabled', true);
                    $('#selectFiscal').prop('disabled', true);
                    break;
            
                case "2":
                    $('#archivo').hide();
                    $('#determinacion').show();
                    $('#observacion').show();
                    $('#selectArchivo').prop('disabled', true);
                    $('#selectDetermina').prop('disabled', false);
                    $('#narracion').prop('disabled', false);
                    $("#unidad").hide();
                    $("#fiscal").hide();
                    $('#selectUnidad').prop('disabled', true);
                    $('#selectFiscal').prop('disabled', true);
                    break;
                
                case "3":
                    $('#determinacion').hide();
                    $('#archivo').hide();
                    $('#observacion').show();
                    $('#selectDetermina').prop('disabled', true);
                    $('#selectArchivo').prop('disabled', true);
                    $('#narracion').prop('disabled', false);
                    $("#unidad").hide();
                    $("#fiscal").hide();
                    $('#selectUnidad').prop('disabled', true);
                    $('#selectFiscal').prop('disabled', true);
                    break;

                case "4":
                    $('#archivo').show();
                    $("#observacion").show();
                    $("#determinacion").hide();
                    $('#selectDetermina').prop('disabled', true);
                    $('#selectArchivo').prop('disabled', false);
                    $('#narracion').prop('disabled', false);
                    $("#unidad").hide();
                    $("#fiscal").hide();
                    $('#selectUnidad').prop('disabled', true);
                    $('#selectFiscal').prop('disabled', true);
                    break;
            
                case "5":
                    $('#archivo').hide();
                    $("#observacion").show();
                    $("#unidad").show();
                    $("#fiscal").show();
                    $("#determinacion").hide();
                    $('#selectUnidad').prop('disabled', false);
                    $('#selectFiscal').prop('disabled', false);
                    $('#narracion').prop('disabled', false);
                    break;
            
                default:
                    $('#determinacion').hide();
                    $('#archivo').hide();
                    $('#observacion').hide();
                    break;
            }
        }); 





    });
</script>
@endpush
