$(document).ready(function(){
    mostrar();
    
    //$(".otros").hide();
    if($("#idRazon2").val()==4){
        if($("#tipoActa").val() == 'OTROS DOCUMENTOS'){
            $(".otros").show();
        }
        else{
            $(".otros").hide();
        }
    }else{
        $('#tipodeActa').hide();
    }

    if($("#idRazon1").val()==4){
        if($("#tipoActaEmpresa").val() == 'OTROS DOCUMENTOS'){
            $(".otros").show();
        }
        else{
            $(".otros").hide();
        }
    }
    else{
        $('#tipodeActa1').hide();
    }
    
    //Si es empresa
    $("#esEmpresa1").change(function(event){
        if ($('#esEmpresa1').is(':checked') ) {
            $('#collapsePersonales2').show();
            $('#collapsePersonales2').prop( "disabled", false );
            $('#collapsePersonales1').hide();
            $('#collapsePersonales1').prop( "disabled", true );
            mostrarmoral();
            paraActadeHechos1();
            $("#datosPer").show();
            $("#divNarracion").show();
        }
    });

    //No es empresa
    $("#esEmpresa2").change(function(event){
        if ($('#esEmpresa2').is(':checked') ) {
            $('#collapsePersonales1').show();
            $('#collapsePersonales1').prop( "disabled", false );
            $('#collapsePersonales2').hide();
            $('#collapsePersonales2').prop( "disabled", true );
            $('#tipodeActa').hide();
            mostrarpersonal();
            paraActadeHechos2();
            $("#datosPer").show();
            $("#divNarracion").show();
        }
    });
});
//empresa
function paraActadeHechos1(){
    $("#idRazon1").change(function(){
        valor = $(this).val();
        if(valor==4){
            $('#tipoActaEmpresa').prop('disabled', false);
            $('#tipodeActa1').show(); 
            if($("#tipoActaEmpresa").val() == 'OTROS DOCUMENTOS'){
                $(".otros").show();
                $("input[name='otroEmpresa']").css("display","block");
                $("#divOtroDoc").show();
            }
            else{
                $(".otros").hide();
            }
        }else{
            $("#otroEmpresa").val('');
            $('#tipodeActa1').hide();
            $('#tipoActaEmpresa').prop('disabled', true);
        }
    });
    $("#tipoActaEmpresa").change(function(){
        valor2 = $("#tipoActaEmpresa option:selected").text();
        if(valor2 == 'OTROS DOCUMENTOS'){
            $(".otros").show();                    
        }
        else{
            $("#otroEmpresa").val('');
            $(".otros").hide();
        }
    });
       
}
//persona
function paraActadeHechos2(){

    $("#idRazon2").change(function(){
        valor = $(this).val();
        if(valor==4){
            $('#tipoActa').prop('disabled', false);
            $('#tipodeActa').show(); 
            if($("#tipoActa").val() == 'OTROS DOCUMENTOS'){
                $(".otros").show();
                $("input[name='otro']").css("display","block");
                //$("#divOtroDoc").show();
            }
            else{
                $(".otros").hide();
            }
        }else{
            $("#otro").val('');
            $('#tipodeActa').hide();
            $('#tipoActa').prop('disabled', true);
        }
    });


/*
    //$(".otros").hide();
    $("#tipoActa").change(function(){
        valor = $(this).val();
        if(valor == 'OTROS DOCUMENTOS'){
            $(".otros").show();
        }
        else{
            $("#otro").val('');
            $(".otros").hide();
        }
    });


    if($("#idRazon2").val()==4){
        if($("#tipoActa").val() == 'OTROS DOCUMENTOS'){
            $(".otros").show();
        }
        else{
            $(".otros").hide();
        }
    }else{
        $('#tipodeActa').hide();
    }


*/
/*
   $("#idRazon2").bind("change",function(){
        // alert("ok");
        valor = $(this).val();
        if(valor==4){
            console.log('es 4');
            $('#tipoActa').prop('disabled', false);
            $('#tipoActa').prop('disabled', false);
            $('#tipodeActa').show();
            $('#estadoCivilActa').prop('disabled', false);
            $('#escActa').prop('disabled', false);
            $('#ocupActa').prop('disabled', false);
        }
        else{
            $('#tipodeActa').hide();
            $('#tipoActa').prop('disabled', true);
            $('#estadoCivilActa').prop('disabled', true);
            $('#escActa').prop('disabled', true);
            $('#ocupActa').prop('disabled', true);
        }
    });
    */
   $("#tipoActa").change(function(){
        valor2 = $("#tipoActa option:selected").text();
        if(valor2 == 'OTROS DOCUMENTOS'){
            $(".otros").show();                    
        }
        else{
            $("#otro").val('');
            $(".otros").hide();
        }
    });
    
   // $('#tipodeActa1').hide();
   // $('#tipodeActa').hide();
}

function mostrar(){
    if ($('#esEmpresa2').is(':checked') ) {
        $('#collapsePersonales1').show();
        $('#collapsePersonales1').prop( "disabled", false );
        $('#collapsePersonales2').hide();
        $('#collapsePersonales2').prop( "disabled", true );
 
        mostrarpersonal();
        $("#datosPer").show();
        $("#divNarracion").show();
    }
    else if($('#esEmpresa1').is(':checked')){
        $('#collapsePersonales2').show();
        $('#collapsePersonales2').prop( "disabled", false );
        $('#collapsePersonales1').hide();
        $('#collapsePersonales1').prop( "disabled", true );
        mostrarmoral();
        $("#datosPer").show();
        $("#divNarracion").show();
    }
    else{
        $('#collapsePersonales1').hide();
        $('#collapsePersonales1').prop( "disabled", true );
        $('#collapsePersonales2').hide();
        $('#collapsePersonales2').prop( "disabled", true );
        $("#datosPer").hide();
        $("#divNarracion").hide();
    }
}

function mostrarpersonal(){
    //Datos personales no requeridos de Persona Moral o Empresa
    $('#nombres2').prop('disabled', true);
    $('#rfc1').prop('disabled', true);
    $('#homo1').prop('disabled', true);
    $('#repLegal').prop('disabled', true);
    $("#fechaAltaEmpresa").prop('disabled', true); 
    $('#telefono1').prop('disabled', true);
    $("#idEstado").prop('disabled', true);   
    $("#idMunicipio").prop('disabled', true);   
    $("#idLocalidad").prop('disabled', true);   
    $("#cp").prop('disabled', true);   
    $("#idColonia").prop('disabled', true);   
    $("#numInterno1").prop('disabled', true);   
    $("#calle1").prop('disabled', true);   
    $("#numExterno1").prop('disabled', true); 
    $("#idRazon1").prop('disabled',true); 
    $("#primerAp2").prop('disabled', true);   
    $("#segundoAp2").prop('disabled', true);   
    
    //Datos personales requeridos de Persona Física
    $('#estadoCivil').prop('disabled', false);
    $('#escolaridad').prop('disabled', false);
    $('#ocupacion').prop('disabled', false);
    $("#nombre2").prop('disabled', false);   
    $("#primerAp").prop('disabled', false);   
    $("#segundoAp").prop('disabled', false);   
    $("#rfc2").prop('disabled', false); 
    $("#homo2").prop('disabled', false);   
    $("#fechaNacimiento").prop('disabled', false);   
    $("#edad").prop('disabled', false);   
    $("#idEstadoOrigen").prop('disabled', false);  
    $("#idMunicipioOrigen").prop('disabled', false);  
    $("#idEstado2").prop('disabled', false);   
    $("#idMunicipio2").prop('disabled', false);   
    $("#idLocalidad2").prop('disabled', false);   
    $("#cp2").prop('disabled', false);   
    $("#idColonia2").prop('disabled', false);   
    $("#numInterno2").prop('disabled', false);   
    $("#calle2").prop('disabled', false);   
    $("#numExterno2").prop('disabled', false);   
    $("#sexo").prop('disabled', false);   
    $("#curp").prop('disabled', false);    
    $("#telefono2").prop('disabled', false);   
    $("#docIdentificacion").prop('disabled', false);   
    $("#numDocIdentificacion").prop('disabled', false);
    $("#idRazon2").prop('disabled',false); 
}
    
function mostrarmoral(){
    //Datos personales requeridos de Persona Moral o Empresa
    $('#nombres2').prop('disabled', false);
    $("#primerAp2").prop('disabled', false);   
    $("#segundoAp2").prop('disabled', false); 
    $('#rfc1').prop('disabled', false);
    $('#homo1').prop('disabled', false);
    $("#fechaAltaEmpresa").prop('disabled', false); 
    $('#repLegal').prop('disabled', false);
    $('#telefono1').prop('disabled', false);
    $("#idEstado").prop('disabled', false);   
    $("#idMunicipio").prop('disabled', false);   
    $("#idLocalidad").prop('disabled', false);   
    $("#cp").prop('disabled', false);   
    $("#idColonia").prop('disabled', false);   
    $("#numInterno1").prop('disabled', false);   
    $("#calle1").prop('disabled', false);   
    $("#numExterno1").prop('disabled', false); 
     $("#idRazon1").prop('disabled', false); 
    
    //Datos personales no requeridos de Persona Física
    $('#estadoCivil').prop('disabled', true);
    $('#escolaridad').prop('disabled', true);
    $('#ocupacion').prop('disabled', true);
    $("#nombre2").prop('disabled', true);   
    $("#primerAp").prop('disabled', true);   
    $("#segundoAp").prop('disabled', true);   
    $("#rfc2").prop('disabled', true); 
    $('#homo2').prop('disabled', true);
    $("#fechaNacimiento").prop('disabled', true);   
    $("#edad").prop('disabled', true); 
    $("#idEstadoOrigen").prop('disabled', true);  
    $("#idMunicipioOrigen").prop('disabled', true);   
    $("#idEstado2").prop('disabled', true);   
    $("#idMunicipio2").prop('disabled', true);   
    $("#idLocalidad2").prop('disabled', true);   
    $("#cp2").prop('disabled', true);   
    $("#idColonia2").prop('disabled', true);   
    $("#numInterno2").prop('disabled', true);   
    $("#calle2").prop('disabled', true);   
    $("#numExterno2").prop('disabled', true);   
    $("#sexo").prop('disabled', true);   
    $("#curp").prop('disabled', true);    
    $("#telefono2").prop('disabled', true);   
    $("#docIdentificacion").prop('disabled', true);   
    $("#numDocIdentificacion").prop('disabled', true);
    $("#idRazon2").prop('disabled', true); 
}


