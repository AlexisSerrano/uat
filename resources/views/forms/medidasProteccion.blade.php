@extends('template.form')
@section('content') 
@section('title','Medidas de protección')
@include('fields.errores')
{!!Form::open(['route' => 'addMedidas'])!!}

 @include('fields.buttons-navegacion')



<div class="card-body boxone">
        <DIV class="row">
            <div class="col-12">
                <div class="form-group">
                    {!! Form::label('tipoProvidencia', 'Tipo de providencia precautoria', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::select('tipoProvidencia', $providencias ,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                </div>
            </div>
            <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('quienEjecuta', 'Quién ejecuta', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::select('quienEjecuta', $ejecutores ,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                    </div>
            </div>
            <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('victima', 'Victima', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::select('victima', $victimas,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                    </div>
            </div>

            <div class="col-6">
            <div class="form-group">
                {!! Form::label('fechaInicio', 'Fecha inicial', ['class' => 'col-form-label-sm']) !!}
                    <div class="input-group date" id="fechaInicio" data-target-input="nearest">
                        {{-- {!! Form::text('fechaInicio', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechaInicio','data-validation'=>'required', 'placeholder' => 'DD/MM/AAAA']) !!} --}}

                                <input type="date" id="fechaInicio" name="fechaInicio" class="form-control form-control-sm", data-validation= "required">
                            {{-- <div class="group-text"><i class="fa fa-calendar"></i></div> --}}
                        </div>
                    </div>
                </div>
            <div class="col-6">
                <div class="form-group">
                {!! Form::label('fechaFinal', 'Fecha final', ['class' => 'col-form-label-sm']) !!}
                    <div class="input-group date" id="fechaFinal" data-target-input="nearest">
                        {{-- {!! Form::text('fechaFinal', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechaFinal','data-validation'=>'required', 'placeholder' => 'DD/MM/AAAA']) !!} --}}
                    
                                <input type="date" id="fechaFinal" name="fechaFinal" class="form-control form-control-sm", data-validation= "required" >
                            {{-- <div class="group-text"><i class="fa fa-calendar"></i></div> --}}
                        
                    </div>
                </div>
            </div>
            <div class="col-12">
            <div class="form-group">
                    {!! Form::label('ObservacionesM', 'Observaciones', ['class' => 'col-form-label-sm']) !!}		
                    <textarea name="ObservacionesM" id="ObservacionesM" cols="15" rows="5" class="form-control form-control-sm", data-validation= "required"></textarea>
                
                <div class="col text-right">
                        {!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarMedidas'))!!}
                </div>
            </div>
        </div>
    </div>
</div>  
    <!--tabla providencias precautorias y/o protección-->
        @include('tables.medidasP')

@endsection

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
@endsection

@push('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#tablaprovidencias').DataTable({
                //"dom": 'rtip',
                "processing": true,
                "serverSide": true,
                "pageLength": 10,
                "language": {
                    "url": '{!! asset('/datatables/latino.json') !!}'
                } ,
                "ajax": "getMedidas",
                "columns": [
                    { data: 'providencia' , name: 'providencia'},
                    { data: 'fechaInicio' , name: 'fechaInicio'},
                    { data: 'fechaFin' , name: 'fechaFin'},
                    { data: 'ejecutor' , name: 'ejecutor'},
                    { data: 'nombre' , name: 'nombre'},
                    { data: 'observacion' , name: 'observacion'},
                    { data: null, "orderable": false,  render: function ( data, type, row ) {
                        return "<a href='{{ url('deleteMedida') }}/"+ data.id +"' class='btn btn-xs btn-primary' >Eliminar</button>"  }  
                    }
                ]
            });
        });
    </script>
@endpush