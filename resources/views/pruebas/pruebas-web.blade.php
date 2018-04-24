@extends('template.main2')
@section('title')
Pre-denuncias
@endsection
@if ($errors->any())
<div class="alert alert-danger">
    @php
    $form = oldForm();
    @endphp
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@section('csss')
{{-- estilos --}}
<link rel="stylesheet" href="{{asset ('css/cssfonts.css')}}">
<link rel="stylesheet" href="{{asset ('css/estilos.css')}}">
<link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
{{-- fileinput --}}
<link rel="stylesheet" href="{{ asset('plugins/fileinput/css/fileinput.min.css') }}">
{{-- validator --}}
<link rel="stylesheet" href="{{ asset('css/theme-jquery-validation.min.css') }}">
{{-- para calendarios --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/css/tempusdominus-bootstrap-4.min.css" /> --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@yield('css')
@endsection
@section('content')
	<div class="container">
	    <div class="row">
		    <div class="col-sm-12">
                   {!!Form::open(['route' => 'preregistro.store'])!!}
                    
                    <br>
                        <p class="lead" align="center">
                    
                                    PRE-DENUNCIA
                    
                        </p>
                        <div>
                            @include('servicios.preregistro.fields.tipo-persona')
                        </div>
                        <div class="card" id="datosPer">
                            <div class="card-header">
                                <p class="lead" align="center">
                    
                                    Datos personales
                    
                                </p>
                            </div>
                            <div id="collapsePersonales1" class="collapse show boxcollapse" >
                                <div class="boxtwo">
                                    <div class="col">
                                    @include('servicios.preregistro.fields.datos-personales')
                                    </div>
                                </div>
                            </div>
                    
                            <div id="collapsePersonales2" class="collapse show boxcollapse" >
                                <div class="boxtwo">
                                    <div class="col">
                                    @include('servicios.preregistro.fields.datos-empresa')
                                    </div>
                                </div>
                            </div>
                    
                    </div>
                        <div class="card" id="datosPer">
                            <div class="card-header">
                            <div class="boxtwo">
                                <div class="form-group" align="center">
                                    <div class="col">
                                        <label class="col-form-label col-form-label-sm"  for="formGroupExampleInput">¿Con violencia?</label>
                                        <div class="clearfix"></div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label col-form-label col-form-label-sm">
                                                @if(isset($form['violencia1']))
                                                <input class="form-check-input" type="radio" id="conViolencia" name="Violencia" value="1" {{$form['violencia1']}}> Sí
                                                @else
                                                <input class="form-check-input" type="radio" id="conViolencia" name="Violencia" value="1"> Sí
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label col-form-label col-form-label-sm">
                                                @if(isset($form['violencia2']))
                                                <input class="form-check-input" type="radio" id="sinViolencia" name="Violencia" value="0" {{$form['violencia2']}}> No
                                                @else
                                                <input class="form-check-input" type="radio" id="sinViolencia" name="Violencia" value="0"> No
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    
                        
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="col">
                                        <label for="narracion" class="col-form-label-sm">Narración</label>
                                        @if(isset($form['narracion']))
                                            {{ Form::textarea('narracion', $form['narracion'], ['class' => 'form-control form-control-sm', 'size' => '30x10', 'data-validation'=>'length', 'data-validation-length'=>'min20']) }}
                                        @else
                                            {{ Form::textarea('narracion', null, ['class' => 'form-control form-control-sm', 'size' => '30x10', 'data-validation'=>'length', 'data-validation-length'=>'min20']) }}
                                        @endif
                                        {{-- <textarea name="narracion" id="narracion" cols="30" rows="10" class="form-control form-control-sm" required=>
                                            @if(isset($form['narracion']))
                                                {{$form['narracion']}}
                                            @endif
                                        </textarea> --}}
                                    </div>
                                </div>
                            </div>
                    
                            <div class="boxtwo">
                                <div class="row">
                                    
                                    <div class="col">   
                                        <div class="text-center">
                                                <a href="http://fiscaliaveracruz.gob.mx/" title="" class="btn btn-primary">Cancelar</a>
                                                {!!Form::submit('Guardar',array('class' => 'btn btn-primary'))!!}
                    
                                            
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                    
                        </div>
                     {!!Form::close()!!}
                    @endsection

@push('scripts')


    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{asset('js/es.js')}}"></script>
    <script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('plugins/fileinput/js/fileinput.min.js')}}" ></script>
    <script src="{{ asset('plugins/fileinput/themes/fa/theme.min.js')}}" ></script>
    <script src="{{ asset('plugins/fileinput/js/locales/es.js')}}" ></script>
    <script src="{{asset('js/semaforos.js')}}"></script>  
    {{-- <script src="{{asset('js/selectsDirecciones.js')}}"></script>   --}}
    <script src="{{asset('js/selects.js')}}"></script>
    <script src="{{asset('js/funciones.js')}}"></script>
    <script src="{{asset('js/preregistro.js')}}"></script> 
    <script>
        


        $(document).on('focus', '.select2', function (e) {
        if (e.originalEvent) {
            $(this).siblings('select').select2('open');
        }
    });

    $.validate({
        lang : 'es'
    });

    $(function () {
        $('#fechanac').datetimepicker({
            format: 'YYYY-MM-DD',
            minDate: moment().subtract(150, 'years').format('YYYY-MM-DD'),
            maxDate: moment().subtract(18, 'years').format('YYYY-MM-DD')
        });
    });

    $("#fechanac").on("change.datetimepicker", function (e) {
        $('#edad').val(moment().diff(e.date,'years'));
    });

    $( "#edad" ).change(function() {
        var anios = $('#edad').val();
        $('#fechanac').datetimepicker('date', moment().subtract(anios, 'years').format('YYYY-MM-DD'));
    });

                    
                            
                </script>


@endsection