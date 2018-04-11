@extends('template.form')
@section('content')
@include('fields.errores')

{!!Form::model($preregistro, array('route' => array('predenuncias.update', $preregistro->id), 'method' => 'PUT' )) !!}
    <div>
        {{-- @include('recepcion.tipo-p-edit') --}}
        <input type="hidden" name="esEmpresa" value="1">
    </div>
        <div class="card-header">
            <p class="lead" align="center">Datos personales</p>
        </div>
            <div class="boxtwo">
                <div class="col">
                @include('servicios.recepcion.fields.empresa-edit')
                </div>
            </div>
        <div class="form-group">
            <div class="col-12">
                <label for="narracion" class="col-form-label-sm">Narración: </label>
                {!!Form::label('nombre',$preregistro->narracion ,['class'=> 'col-form-label-sm labelCambioNarracion'])!!}
				<div class="input-group inputOculto" id="inputNarracion">
					{{ Form::textarea('narracion', $preregistro->narracion, ['class'=>'form-control form-control-sm','size' => '30x5']) }}
                    <!--textarea name="narracion" id="" cols="30" rows="10" class="form-control form-control-sm" ></textarea-->
                    <input type="button" id="botonCambioNarracion" value="Cancelar" class="btn btn-sm btn-danger">
				</div>
            </div>
        </div>
        <div><p style="color:blue">NOTA:Todas las etiquetas que se encuentran arriba pueden ser editadas dando click en el texto</p></div>
    
        <div class="boxtwo">
            <div class="row">
                <div class="text-left col">
                    <a href="{{url('predenuncias')}}" title="" class="btn  button button3 ">Regresar</a>
                </div>       
                <div class="text-right col">
                    <a href="{{url('estado/'.$preregistro->id.'/0')}}" title="button1" class="btn  button button1 ">En cola</a>
                    <a href="#" title="" class="btn button button2 btnEnUrgente" id="{{$preregistro->id}}">Urgente</a>
                    {!!Form::submit('Guardar',array('class' => 'btn  button button4'))!!}
                </div>
                <meta name="csrf-token" content="{{ csrf_token() }}">
            </div>
        </div>


    {!!Form::close()!!}
    <br><br><br><br>
@endsection

@section('css')
<style>
    .inputOculto{
        display: none;
    }

</style>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
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
            
        });

    });

    $("#idEstado").focusout(function(event){
        if(event.target.value!=""){
            $.get("../../municipios/"+event.target.value+"", function(response, estado){
                $("#idMunicipio").empty();
                $("#idMunicipio").append("<option value=''>Seleccione un municipio</option>");
                for(i=0; i<response.length; i++){
                    $("#idMunicipio").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                }
            });

            
        }
    });

    $("#idMunicipio").focusout(function(event){
        if(event.target.value!=""){
            $.get("../../localidades/"+event.target.value+"", function(response, municipio){
                $("#idLocalidad").empty();
                $("#idLocalidad").append("<option value=''>Seleccione una localidad</option>");
                for(i=0; i<response.length; i++){
                    $("#idLocalidad").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                }
            });
            
            $.get("../../codigos/"+event.target.value+"", function(response, municipio){
                $("#cp").empty();
                $("#cp").append("<option value=''>Seleccione un código postal</option>");
                for(i=0; i<response.length; i++){
                    $("#cp").append("<option value='"+response[i].id+"'> "+response[i].codigoPostal+"</option>");
                }
            });

        }
    });

    $("#cp").focusout(function(event){
        if(event.target.value!=""){
            $.get("../../colonias/"+$('#cp option:selected').html()+"", function(response, cp){
                $("#idColonia").empty();
                $("#idColonia").append("<option value=''>Seleccione una colonia</option>");
                for(i=0; i<response.length; i++){
                    $("#idColonia").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                }
            });
        
        }
    });


</script>
@endpush