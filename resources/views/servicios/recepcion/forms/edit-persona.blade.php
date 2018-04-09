@extends('template.main')
@section('content')
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
       
{!!Form::model($preregistro, array('route' => array('predenuncias.update', $preregistro->id), 'method' => 'PUT')) !!}
<input type="hidden" name="esEmpresa" value="0">
<div class="card container-create" id="datosPer">
    <div class="card-header">
        <p class="lead" align="center">Datos personales</p>
    </div>
    <div id="collapsePersonales1" class="collapse show boxcollapse" >
        <div class="boxtwo">
            <div class="col">
                @include('servicios.recepcion.personales-edit')
            </div>
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
    <div class="row">
        <div class="text-left col">
            <a href="{{url('predenuncias')}}" title="" class="btn  button button3 ">Regresar</a>
        </div>       
        <div class="text-right col">
            <a href="{{url('estado/'.$preregistro->id.'/0')}}" title="button1" class="btn  button button1 ">En cola</a>
            <a href="{{url('estado/'.$preregistro->id.'/1')}}" title="" class="btn button button2">Urgente</a>
            {!!Form::submit('Guardar',array('class' => 'btn  button button4'))!!}
        </div>
    </div>
</div>
{!!Form::close()!!}

@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <style>
        .inputOculto{
            display: none;
        }
    </style>
    
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<script>
    $(function () {
        $('#fechanac').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });

    $("#fechanac").on("change.datetimepicker", function (e) {
        $('#edad').val(moment().diff(e.date,'years'));
    });

    $( "#edad" ).change(function() {
        var anios = $('#edad').val();
        $('#fechanac').datetimepicker('date', moment().subtract(anios, 'years').format('YYYY-MM-DD'));
    });

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
@endsection