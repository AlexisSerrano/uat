@extends('template.form')
@section('content')
@include('fields.errores')


       
{{-- {!!Form::model($preregistro, array('route' => array('put.registro', $preregistro->id), 'method' => 'POST')) !!} --}}
{!!Form::model($preregistro, ['route' => ['put.registro', $preregistro->id]]) !!}
<input type="hidden" name="esEmpresa" value="0">
<div class="card container-create" id="datosPersona">
    <div class="card-header lead" align="center">
        Datos personales
    </div>
    <div id="collapsePersonales1" class="collapse show boxcollapse" >
        <div class="boxtwo">
            <div class="col">
                @include('servicios.recepcion.fields.empresa-edit')
            </div>
            
            <div class="form-group">
                <div class="col-12">
                    <label for="narracion" class="col-form-label-sm">Descripción de hechos</label>
                    {!!Form::label('nombre',$preregistro->narracion ,['class'=> 'col-form-label-sm labelCambioNarracion hideLabels'])!!}
                    <div class="input-group inputOculto" id="inputNarracion">
                        {{ Form::textarea('narracion', $preregistro->narracion, ['class'=>'form-control form-control-sm','size' => '30x5','style'=>'width:100% !important ']) }}
                        <!--textarea name="narracion" id="" cols="30" rows="10" class="form-control form-control-sm" ></textarea-->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-left col">
            <a href="{{url('registros')}}" title="" class="btn btn-secondary">Regresar</a>
        </div>   
        <div class="text-right col">
                <span id="editFields" class="btn  btn-secondary">Editar</span>
            <a href="{{ url('atender/'.$preregistro->id)}}" title="" class="btn btn-secondary">Atender</a>
            {!!Form::submit('Guardar',array('class' => 'btn btn-primary'))!!}
        
        </div>
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
<script src="{{ asset('js/rfcMoral.js') }}"></script>

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

         $(".labelCambioPrimerAp").click(function(){
            $('.llabelCambioPrimerAp').hide();
            $('#inputPrimerAp').show().css('display', 'flex');
        });
        //ocultar el campo de nombre y mostrar el label anterior
        $("#botonCambioPrimerAp").click(function(){
            $('.labelCambioPrimerAp').show();
            $('#inputPrimerAp').hide();
        });

         $(".labelCambioSegundoAp").click(function(){
            $('.llabelCambioSegundoAp').hide();
            $('#inputSegundoAp').show().css('display', 'flex');
        });
        //ocultar el campo de nombre y mostrar el label anterior
        $("#botonCambioSegundoAp").click(function(){
            $('.labelCambioSegundoAp').show();
            $('#inputSegundoAp').hide();
        });
        
        //ocultar el campo de nombre y mostrar el label anterior
        $("#botonCambioNombre").click(function(){
            $('.labelCambioNombre').show();
            $('#inputNombre').hide();
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
        
        //editar el campo al dar clic en el label de representante legal
        $(".labelCambioRepLegal").click(function(){
            $('.labelCambioRepLegal').hide();
            $('#inputRepLegal').show().css('display', 'flex');
        });
        //ocultar el campo y mostrar el label anterior
        $("#botonCambioRepLegal").click(function(){
            $('.labelCambioRepLegal').show();
            $('#inputRepLegal').hide();
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