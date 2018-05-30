$(document).ready(function(){
    $('#actaPersona').hide();
    $('#actaEmpresa').hide();
    
    $("#esEmpresa2").change(function(event){
        if ($('#esEmpresa2').is(':checked') ) {
            $('#actaEmpresa').hide();
            $('#actaPersona').show();
           habilitarPersona();
            console.log('entrapersona');
        }
    });
    
 $("#esEmpresa1").change(function(event){
        if($('#esEmpresa1').is(':checked')){
            $('#actaPersona').hide();
            $('#actaEmpresa').show();
            habilitarEmpresa();
            
        }
    });

function habilitarPersona(){
    $('#nombres2').prop('disabled', true);
    $('#rfc2').prop('disabled', true);
    $('#homo2').prop('disabled', true);
    $('#representanteLegal').prop('disabled', true);
    $("#fechaAltaEmpresa").prop('disabled', true); 

    $("#nombre2").prop('disabled', false);   
    $("#primerAp").prop('disabled', false);   
    $("#segundoAp").prop('disabled', false);   
    $("#fecha_nac").prop('disabled', false);
    $("#estadoCivilActa1").prop('disabled', false);
    $("#sexo").prop('disabled', false);
    $("#idEstadoOrigen").prop('disabled', false);
    $("#idMunicipioOrigen").prop('disabled', false);
    $("#curp").prop('disabled', false);
    $("#escActa1").prop('disabled', false); 
    $("#ocupActa1").prop('disabled', false); 
    $("#rfc1").prop('disabled', false); 
    $("#homo1").prop('disabled', false);   

    
    
}

function habilitarEmpresa(){

    $("#nombre2").prop('disabled', true);   
    $("#primerAp").prop('disabled', true);   
    $("#segundoAp").prop('disabled', true);   
    $("#fecha_nac").prop('disabled', true);
    $("#estadoCivilActa1").prop('disabled', true);
    $("#sexo").prop('disabled', true);
    $("#idEstadoOrigen").prop('disabled', true);
    $("#idMunicipioOrigen").prop('disabled', true);
    $("#curp").prop('disabled', true);
    $("#escActa1").prop('disabled', true); 
    $("#ocupActa1").prop('disabled', true); 
    $("#rfc1").prop('disabled', true); 
    $("#homo1").prop('disabled', true);     
   

    $('#nombres2').prop('disabled', false);
    $('#rfc2').prop('disabled', false);
    $('#homo2').prop('disabled', false);
    $('#representanteLegal').prop('disabled', false);
    $("#fechaAltaEmpresa").prop('disabled', false); 

    
}



});


    
    
      
