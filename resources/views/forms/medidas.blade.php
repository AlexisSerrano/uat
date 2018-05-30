@extends('template.form')
@section('content') 
@section('title','Medidas de protección')
@include('fields.errores')
{!!Form::open(['route' => 'addMedidas2', 'id'=>'form'])!!}

 @include('fields.buttons-navegacion')
 @include('fields.botonborrar')
 <br>


{{-- 
<div class="card-body boxone">
        <div class="col">
        <DIV class="row"> --}}
                <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {!! Form::label('tipoProvidencia', 'Tipo de providencia precautoria', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::select('tipoProvidencia', $providencias ,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                </div>
            </div>
          
            <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('quienEjecuta', 'Quién ejecuta', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::select('quienEjecuta', $ejecutores ,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                    </div>
            </div>
            <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('victima', 'Víctima/Ofendido', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::select('victima', $victimas,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                    </div>
            </div>

            <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('nombre', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Nombre','data-validation'=> 'required']) !!}
                    </div>
                </div>
            <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('primerA', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::text('primerA', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Primer apellido','data-validation'=> 'required']) !!}
                        </div>
             </div>

             <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('segundoA', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('segundoA', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Segundo apellido','data-validation'=> 'required']) !!}
                    </div>
             </div>

             <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('calle', 'Calle', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('calle', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Calle','data-validation'=> 'required']) !!}
                    </div>
             </div>
             <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('numero', 'Número', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('numero', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Número','data-validation'=> 'required']) !!}
                    </div>
             </div>
             <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('colonia', 'Colonia', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('colonia', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Colonia','data-validation'=> 'required']) !!}
                    </div>
             </div>
             <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('codigo', 'Código Postal', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('codigo', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Código postal','data-validation'=> 'required']) !!}
                    </div>
             </div>

             <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('ciudad', 'Ciudad', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('ciudad', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Ciudad','data-validation'=> 'required']) !!}
                    </div>
             </div>

             <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('estado', 'Estado', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('estado', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Estado','data-validation'=> 'required']) !!}
                    </div>
             </div>
             <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('celular', 'Celular', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('celular', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Celular','data-validation'=> 'required']) !!}
                    </div>
             </div>
             <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('denunciante', 'Denunciante', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('denunciante', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Denunciante','data-validation'=> 'required']) !!}
                    </div>
             </div>
             <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('delito', 'Delito', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('delito', null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Delito','data-validation'=> 'required']) !!}
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
        {{-- </div> --}}
            
   
</div>
            
            <div class="col text-right">
                    {!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarMedidas'))!!}
            </div>
    {{-- </div> --}}
   
{{-- </div>   --}}




    <!--tabla providencias precautorias y/o protección-->
        {{-- @include('tables.medidasP') --}}
         @include('tables.medidas')
@endsection

@section('css')
	
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
@endsection

@push('scripts')
	{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script> --}}
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/borrar.js') }}"></script>
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