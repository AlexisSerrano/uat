@extends('template.form')
@section('content')
@include('fields.errores')
        
{{-- {!!Form::model($preregistro, array('route' => array('put.registro', $preregistro->id), 'method' => 'PUT')) !!} --}}
{!!Form::model($preregistro, ['route' => ['put.registro', $preregistro->id],'id'=>'formData']) !!}

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
                    <label for="narracion" class="col-form-label-sm">Descripción de hechos </label>
                    {!!Form::label('nombre',$preregistro->narracion ,['class'=> 'col-form-label-sm labelCambioNarracion hideLabels'])!!}
                    <div class="input-group inputOculto" id="inputNarracion">
                        {{ Form::textarea('narracion', $preregistro->narracion, ['class'=>'form-control form-control-sm','size' => '30x5','style'=>'width:100% !important','data-validation'=>'length','data-validation-length'=>'20-5000']) }}
                        <!--textarea name="narracion" id="" cols="30" rows="10" class="form-control form-control-sm" ></textarea-->                        
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="text-left col">
            @if (is_null($preregistro->statusCola))
                <a href="{{route('registros.orientador')}}" title="" class="btn btn-secondary">Regresar</a>
            @else
                <a href="{{route('devolver',$preregistro->id)}}" title="" class="btn btn-secondary">Devolver turno</a>
            @endif
        </div>   
        <div class="text-right col">
                <span id="editFields" class="btn  btn-secondary">Editar</span>
            <a href="{{ url('atender/'.$preregistro->id)}}" title="" class="btn btn-secondary">Atender</a>
            {!!Form::submit('Guardar',array('class' => 'btn btn-primary', 'style'=>'display:none','id'=>'saveForm'))!!}
        
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

<script src="{{ asset('js/curp.js') }}"></script>
<script src="{{ asset('js/rfcFisico.js') }}"></script>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script> --}}
<script>
    

    $(document).ready(function(){

        if( ($("#docIdentificacion").val()) ==14){                
                $("#inputDocIden").hide();
                jQuery('form#numDocIdentificacion').unbind('submit');
        }

            $("#editFields").click(function(){
                $( "#saveForm" ).toggle();
            if($("#editFields").html()=="Editar"){
                $(".hideLabels").hide();
                $(".inputOculto").show();
                $("#editFields").addClass("btn-danger");
                $("#editFields").html("Cancelar");
                if($("#otroDoc").val() != 'OTROS DOCUMENTOS'){                        
                    $('.tipodeActa').hide();
                }                
                if($("#idRazon").val()==2){                    
                    $('.tipodeActa').hide();
                    $('.tipodeActa1').hide();
                }
            }else{
                $(".hideLabels").show();
                $(".inputOculto").hide();
                $("#editFields").html("Editar");
                $("#editFields").removeClass("btn-danger")                                                
                $('#formData').validate({
                    showErrors: function(errorMap, errorList) {                        
                    }
                });
            }          
        });

        $("#docIdentificacion").change(function(event){
            $("#numDocIdentificacion").val('');
            if( ($("#docIdentificacion").val()) ==14){
                $("#inputDocIden").hide();
                jQuery('form#numDocIdentificacion').unbind('submit');
            }else{
                $("#inputDocIden").show();
            }
        });


                /*Funcionalidad constancia de extravio*/
                $( "#idRazon" ).change(function() {                         
                if($("#idRazon").val()==4){                    
                    $(".inputOculto").show();
                    $('.tipodeActa1').show();  
                                      
                    if($("#otroDoc").val() == 'OTROS DOCUMENTOS'){                        
                        $('.tipodeActa').show();
                    }
                    else{
                        $("#tipoActa1").show();
                        $("#inputRazon1").hide();
                    }
                }else{
                    $('.tipodeActa').hide();
                    $('.tipodeActa1').hide();
                }                
        });


        $("#otroDoc").change(function() {                        
            if($("#otroDoc").val() == 'OTROS DOCUMENTOS'){                
                console.log("Mostrar el especifique")
                $('#inputRazon1').show();
            }else{                
                console.log("Ocultar el especifique")
                $('#inputRazon1').hide();
            }
        });
    });

    $("#idEstado").change(function(event){
        limpiarDomicilioSel(1);
        if(event.target.value!=""){
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