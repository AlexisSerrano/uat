@extends('template.form')
@if ($preregistro->statusCola==0)
	@section('title', 'Registros en cola')
@else
	@section('title', 'Registros urgentes')
@endif

@section('content')
@include('fields.errores')

<style>
        .alert-info{
           background-color: #0e0e0e!important;
           border-color: #f5f8f905;
        }
        
        </style>
                   
{!!Form::model($preregistro, array('route' => array('predenuncias.update', $preregistro->id), 'method' => 'POST')) !!}
<input type="hidden" name="esEmpresa" value="0">
<div class="card container-create" id="datosPersona">
    <div class="card-header lead" align="center">
        Datos personales
    </div>
        <div class="boxtwo">
            <div class="col">
                @include('servicios.recepcion.fields.personales-edit')
            </div>
            
            <div class="form-group">
                <div class="col-12">
                    <label for="narracion" class="col-form-label-sm">Narración: </label>
                    {!!Form::label('nombre',$preregistro->narracion ,['class'=> 'col-form-label-sm hideLabels'])!!}
                    <div class="input-group inputOculto" id="inputNarracion">
                        {{ Form::textarea('narracion', $preregistro->narracion, ['class'=>'form-control form-control-sm','size' => '30x5','style'=>'width:100% !important']) }}
                        <!--textarea name="narracion" id="" cols="30" rows="10" class="form-control form-control-sm" ></textarea-->                        
                    </div>
                </div>
            </div>
        </div>

    
    <div class="row">
        <div class="text-left col">
            <a href="{{redirect()->getUrlGenerator()->previous()}}" title="" class="btn btn-secondary ">Regresar</a>
        </div>       
        <div class="text-right col">
                <span id="editFields" class="btn  btn-secondary">Editar</span>

            @if(is_null($preregistro->statusCola))
                <a href="{{url('estado/'.$preregistro->id.'/0')}}" class="btn  btn-secondary ">En cola</a>
                <a href="#" title="" class="btn btn-secondary btnEnUrgente" id="{{$preregistro->id}}">Urgente</a>
            @endif
            @if($preregistro->statusCola=="0")   
                <a href="{{url('estado/'.$preregistro->id.'/99')}}" class="btn  btn-secondary ">Descartar</a>
                <a href="#" title="" class="btn btn-secondary btnEnUrgente" id="{{$preregistro->id}}">Urgente</a>
            @endif
            @if($preregistro->statusCola==1)    
                <a href="{{url('estado/'.$preregistro->id.'/99')}}" class="btn  btn-secondary ">Descartar</a>
                <a href="{{url('estado/'.$preregistro->id.'/0')}}" class="btn  btn-secondary ">En cola</a>
            @endif
            {!!Form::submit('Guardar',array('class' => 'btn  btn-primary'))!!}
        </div>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </div>
</div>
{!!Form::close()!!}

@endsection
@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" /> --}}
    <style>
        .inputOculto{
            display: none;
        }
    </style>
    
@endsection
@push('scripts')

<script src="{{ asset('js/curp.js') }}"></script>
<script src="{{ asset('js/rfcFisico.js') }}"></script>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script> --}}
<script>
    // $(function () {
    //     $('#fechanac').datetimepicker({
    //         format: 'YYYY-MM-DD'
    //     });
    // });

    // $("#fechanac").on("change.datetimepicker", function (e) {
    //     $('#edad').val(moment().diff(e.date,'years'));
    // });

    // $( "#edad" ).change(function() {
    //     var anios = $('#edad').val();
    //     $('#fechanac').datetimepicker('date', moment().subtract(anios, 'years').format('YYYY-MM-DD'));
    // });

    $(document).ready(function(){


                $("#editFields").click(function(){
            if($("#editFields").html()=="Editar"){
                $(".hideLabels").hide();
                $(".inputOculto").show();
                $("#editFields").addClass("btn-danger");
                $("#editFields").html("Cancelar");
            }else{
                $(".hideLabels").show();
                $(".inputOculto").hide();
                $("#editFields").html("Editar");
                $("#editFields").removeClass("btn-danger")                                
            }          
        });
         
        /*
        //editar el campo al dar clic en el label de nombre
        $(".labelCambioNombre").click(function(){
            $('.labelCambioNombre').hide();
            $('#inputNombre').show().css('display', 'flex');
        });
        //ocultar el campo de nombre y mostrar el label anterior
        $("#botonCambioNombre").click(function(){
            $('.labelCambioNombre').show();
            $('#inputNombre').hide();
        });
        
        //editar el campo al dar clic en el label de nombre
        $(".labelCambioPrimerAp").click(function(){
            $('.labelCambioPrimerAp').hide();
            $('#inputPrimerAp').show().css('display', 'flex');
        });
        //ocultar el campo de nombre y mostrar el label anterior
        $("#botonCambioPrimerAp").click(function(){
            $('.labelCambioPrimerAp').show();
            $('#inputPrimerAp').hide();
        });
        
        //editar el campo al dar clic en el label de nombre
        $(".labelCambioSegundoAp").click(function(){
            $('.labelCambioSegundoAp').hide();
            $('#inputSegundoAp').show().css('display', 'flex');
        });
        //ocultar el campo de nombre y mostrar el label anterior
        $("#botonCambioSegundoAp").click(function(){
            $('.labelCambioSegundoAp').show();
            $('#inputSegundoAp').hide();
        });
        
        //editar el campo al dar clic en el label de rfc
        $(".labelCambioRfc").click(function(){
            $('.labelCambioRfc').hide();
            $('#inputRfc').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioRfc").click(function(){
            $('.labelCambioRfc').show();
            $('#inputRfc').hide();
        });
        
        //editar el campo al dar clic en el label de rfc
        $(".labelCambioFechaNac").click(function(){
            $('.labelCambioFechaNac').hide();
            $('#inputFechaNac').show().css('display', 'flex');
            $('.labelCambioEdad').hide();
            $('#inputEdad').show().css('display', 'flex');
        });
        
        //editar el campo al dar clic en el label de representante legal
        $(".labelCambioEdad").click(function(){
            $('.labelCambioFechaNac').hide();
            $('#inputFechaNac').show().css('display', 'flex');
            $('.labelCambioEdad').hide();
            $('#inputEdad').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioEdad").click(function(){
            $('.labelCambioFechaNac').show();
            $('#inputFechaNac').hide();
            $('.labelCambioEdad').show();
            $('#inputEdad').hide();
        });
        
        //editar el campo al dar clic en el label de representante legal
        $(".labelCambioSexo").click(function(){
            $('.labelCambioSexo').hide();
            $('#inputSexo').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioSexo").click(function(){
            $('.labelCambioSexo').show();
            $('#inputSexo').hide();
        });
        
        //editar el campo al dar clic en el label de Telefono
        $(".labelCambioTelefono").click(function(){
            $('.labelCambioTelefono').hide();
            $('#inputTelefono').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioTelefono").click(function(){
            $('.labelCambioTelefono').show();
            $('#inputTelefono').hide();
        });
        
        //editar el campo al dar clic en el label de Telefono
        $(".labelCambioCurp").click(function(){
            $('.labelCambioCurp').hide();
            $('#inputCurp').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioCurp").click(function(){
            $('.labelCambioCurp').show();
            $('#inputCurp').hide();
        });

        //editar el campo al dar clic en el label de Calle
        $(".labelCambioCalle").click(function(){
            $('.labelCambioCalle').hide();
            $('#inputCalle').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioCalle").click(function(){
            $('.labelCambioCalle').show();
            $('#inputCalle').hide();
        });

        //editar el campo al dar clic en el label de Numero Interno
        $(".labelCambioNumInterno").click(function(){
            $('.labelCambioNumInterno').hide();
            $('#inputNumInterno').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioNumInterno").click(function(){
            $('.labelCambioNumInterno').show();
            $('#inputNumInterno').hide();
        });

        //editar el campo al dar clic en el label de Numero Externo
        $(".labelCambioNumExterno").click(function(){
            $('.labelCambioNumExterno').hide();
            $('#inputNumExterno').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioNumExterno").click(function(){
            $('.labelCambioNumExterno').show();
            $('#inputNumExterno').hide();
        });

        //editar el campo al dar clic en el label de Numero Externo
        $(".labelCambioNarracion").click(function(){
            $('.labelCambioNarracion').hide();
            $('#inputNarracion').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioNarracion").click(function(){
            $('.labelCambioNarracion').show();
            $('#inputNarracion').hide();
        });
        
        //editar el campo al dar clic en el label de Numero Externo
        $(".labelCambioDoc").click(function(){
            $('.labelCambioDoc').hide();
            $('#inputDoc').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioDoc").click(function(){
            $('.labelCambioDoc').show();
            $('#inputDoc').hide();
        });
        
        //editar el campo al dar clic en el label de Numero Externo
        $(".labelCambioDocIden").click(function(){
            $('.labelCambioDocIden').hide();
            $('#inputDocIden').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioDocIden").click(function(){
            $('.labelCambioDocIden').show();
            $('#inputDocIden').hide();
        });
        
        //editar el campo al dar clic en el label de Razon
        $(".labelCambioRazon").click(function(){
            $('.labelCambioRazon').hide();
            $('#inputRazon').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioRazon").click(function(){
            $('.labelCambioRazon').show();
            $('#inputRazon').hide();
        });


        //mostrar los select de direccion al dar clic en algun label que pertenece a un select
        $(".labelCambioDireccion").click(function(){
            $('.labelCambioDireccion').hide();
            $('#inputDireccionEstado').show().css('display', 'flex');
            $('#inputDireccionMunicipio').show().css('display', 'flex');
            $('#inputDireccionLocalidad').show().css('display', 'flex');
            $('#inputDireccionCp').show().css('display', 'flex');
            $('#inputDireccionColonia').show().css('display', 'flex');
            $("#idEstado").prop('disabled', false);   
            $("#idMunicipio").prop('disabled', false);   
            $("#idLocalidad").prop('disabled', false);   
            $("#cp").prop('disabled', false);   
            $("#idColonia").prop('disabled', false);
        });
        //ocultar selects al dar clic en cancelar
        $("#botonCambioDireccion").click(function(){
            $('.labelCambioDireccion').show();
            $('#inputDireccionEstado').hide();
            $('#inputDireccionMunicipio').hide();
            $('#inputDireccionLocalidad').hide();
            $('#inputDireccionCp').hide();
            $('#inputDireccionColonia').hide();
            $("#idEstado").prop('disabled', true);   
            $("#idMunicipio").prop('disabled', true);   
            $("#idLocalidad").prop('disabled', true);   
            $("#cp").prop('disabled', true);   
            $("#idColonia").prop('disabled', true);   
            
        }); */

        $("#docIdentificacion").change(function(event){
            $("#numDocIdentificacion").val('');
        });

    });


    $("#idEstado").change(function(event){
        if(event.target.value!=""){
            limpiarDomicilioSel(1);
            $.get(route('get.municipio', event.target.value), function(response, estado){
                for(i=0; i<response.length; i++){
                    $("#idMunicipio").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                }
            });
        }else{
            limpiarDomicilioSel(1);
        }
    });

    $("#idMunicipio").change(function(event){
        if(event.target.value!=""){
            limpiarDomicilioSel(2);
            $.get(route('get.localidad', event.target.value), function(response, municipio){
                for(i=0; i<response.length; i++){
                    $("#idLocalidad").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                }
            });
            $.get(route('get.colonia2', event.target.value), function(response, municipio){
                for(i=0; i<response.length; i++){
                    $("#idColonia").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                }
		    });
            $.get(route('get.codigo', event.target.value), function(response, municipio){
                for(i=0; i<response.length; i++){
                    $("#cp").append("<option value='"+response[i].id+"'> "+response[i].codigoPostal+"</option>");
                }
            });

        }else{
            limpiarDomicilioSel(2);
        }

    });

    function limpiarDomicilioSel(idSelChanged){
        switch(idSelChanged){
            case 1:
                $("#idMunicipio").empty();
                $("#idMunicipio").append("<option value=''>Seleccione un municipio</option>");
            case 2:
                $("#idLocalidad").empty();
                $("#idLocalidad").append("<option value=''>Seleccione una localidad</option>");
            case 3:
                $("#idColonia").empty();
                $("#idColonia").append("<option value=''>Seleccione un colonia</option>");
            case 4:
                $("#cp").empty();
                $("#cp").append("<option value=''>Seleccione un código postal</option>");
        }
    }



</script>
@endpush