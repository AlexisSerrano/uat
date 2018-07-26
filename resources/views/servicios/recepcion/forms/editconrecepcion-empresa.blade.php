@extends('template.form')
@if ($preregistro->statusCola==0)
	@section('title', 'Registros en cola')
@else
	@section('title', 'Registros urgentes')
@endif
 
@section('content')
@include('fields.errores')
        
{!!Form::model($preregistro, array('route' => array('predenuncias.update', $preregistro->id), 'method' => 'POST')) !!}
        <div>
        {{-- @include('recepcion.tipo-p-edit') --}}
        <input type="hidden" name="esEmpresa" value="1">
    </div>
    
    <div class="card-header lead" align="center">
        Datos personales
    </div>
    
    <div class="boxtwo">
        <div class="col">
        @include('servicios.recepcion.fields.empresa-edit')
        </div>
        <div class="form-group">
            <div class="col-12">
                    {!! Form::label('narracion', 'Narración: ', ['class' => 'col-form-label-sm hideLabels']) !!}                                    
                    {!!Form::label('nombre',$preregistro->narracion ,['class'=> 'col-form-label-sm hideLabels'])!!}                    
                    <div class="input-group inputOculto" id="inputNarracion">
                        {!! Form::label('narracion', 'Narración: ', ['class' => 'col-form-label-sm']) !!}
                        {{ Form::textarea('narracion', $preregistro->narracion, ['class'=>'form-control form-control-sm','size' => '30x5','style'=>'width:100% !important ']) }}
                        <!--textarea name="narracion" id="" cols="30" rows="10" class="form-control form-control-sm" ></textarea-->                        
                    </div>
            </div>
        </div>
    </div>
            
    <div class="boxtwo">
        <div class="row">
            <div class="text-left col">
                <a href="{{redirect()->getUrlGenerator()->previous()}}" title="" class="btn btn-secondary ">Regresar</a>
            </div>       
            <div class="text-right col">                    
                    <span id="editFields" class="btn  btn-secondary">Editar</span>

                @if(is_null($preregistro->statusCola))
                    <a href="{{url('estado/'.$preregistro->id.'/0')}}" title="" class="btn  btn-secondary ">En cola</a>
                    <a href="#" title="" class="btn btn-secondary btnEnUrgente" id="{{$preregistro->id}}">Urgente</a>
                @endif
                @if($preregistro->statusCola=="0")   
                    <a href="{{url('estado/'.$preregistro->id.'/99')}}" title="" class="btn  btn-secondary ">Descartar</a>
                    <a href="#" title="" class="btn btn-secondary btnEnUrgente" id="{{$preregistro->id}}">Urgente</a>
                @endif
                @if($preregistro->statusCola==1)    
                    <a href="{{url('estado/'.$preregistro->id.'/99')}}" title="" class="btn  btn-secondary ">Descartar</a>
                    <a href="{{url('estado/'.$preregistro->id.'/0')}}" title="" class="btn  btn-secondary ">En cola</a>
                @endif
{{--                    
                        <a href="{{url('estado/'.$preregistro->id.'/99')}}" title="button1" class="btn  btn-secondary ">Descartar</a>
                 --}}
                {!!Form::submit('Guardar',array('class' => 'btn  btn-primary', 'style'=>'display:none','id'=>'saveForm'))!!}
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
<script src="{{ asset('js/rfcMoral.js') }}"></script>

<script>    

    $(document).ready(function(){  
                
        $("#editFields").click(function(){
            $( "#saveForm" ).toggle();
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

        $("#docIdentificacion").change(function(event){
            $("#numDocIdentificacion").val('');
        });

    }); 

    $("#idEstado").change(function(event){
        alert("con");
        if(event.target.value!=""){
            $.get(route('get.municipio', event.target.value), function(response, estado){
                limpiarDomicilioSel(1);
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