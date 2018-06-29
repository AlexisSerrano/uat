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
    $('#representanteLegal2').prop('disabled', true);
    $("#telefono2").prop('disabled', true); 
    $("#idEstado").prop('disabled', true); 
    $("#idMunicipio").prop('disabled', true); 
    $("#idLocalidad").prop('disabled', true); 
    $("#idColonia").prop('disabled', true); 
    $("#cp").prop('disabled', true); 
    $("#fechaAltaEmpresa").prop('disabled', true);
    $("#calle2").prop('disabled', true); 
    $("#numExterno2").prop('disabled', true); 
    $("#numInterno2").prop('disabled', true); 
    $("#docIdentificacion2").prop('disabled', true);
    $("#expedido2").prop('disabled', true); 
    $("#numDocIdentificacion2").prop('disabled', true); 
    $("#tipoActa2").prop('disabled', true); 
    $("#otro2").prop('disabled', true);  

    

    $("#nombres").prop('disabled', false);   
    $("#primerAp").prop('disabled', false);   
    $("#segundoAp").prop('disabled', false);   
    $("#fechaNacimiento").prop('disabled', false);
    $("#estadoCivilActa1").prop('disabled', false);
    $("#sexo").prop('disabled', false);
    $("#idEstadoOrigen").prop('disabled', false);
    $("#idMunicipioOrigen").prop('disabled', false);
    $("#curp").prop('disabled', false);
    $("#escActa1").prop('disabled', false); 
    $("#ocupActa1").prop('disabled', false); 
    $("#telefono").prop('disabled', false);
    $("#rfc").prop('disabled', false); 
    $("#homo").prop('disabled', false);  
    $("#idEstado2").prop('disabled', false);
    $("#idMunicipio2").prop('disabled', false);
    $("#idLocalidad2").prop('disabled', false);
    $("#idColonia2").prop('disabled', false);
    $("#cp2").prop('disabled', false);
    $("#calle").prop('disabled', false); 
    $("#numExterno").prop('disabled', false);
    $("#numInterno").prop('disabled', false);
    $("#docIdentificacion").prop('disabled', false);
    $("#numDocIdentificacion").prop('disabled', false);
    $("#expedido").prop('disabled', false);
    $("#tipoActa").prop('disabled', false);
    $("#otro").prop('disabled', true); 

    
    
}

function habilitarEmpresa(){

    $("#nombres").prop('disabled', true);   
    $("#primerAp").prop('disabled', true);   
    $("#segundoAp").prop('disabled', true);   
    $("#fechaNacimiento").prop('disabled', true);
    $("#estadoCivilActa1").prop('disabled', true);
    $("#sexo").prop('disabled', true);
    $("#idEstadoOrigen").prop('disabled', true);
    $("#idMunicipioOrigen").prop('disabled', true);
    $("#curp").prop('disabled', true);
    $("#escActa1").prop('disabled', true); 
    $("#ocupActa1").prop('disabled', true); 
    $("#telefono").prop('disabled', true);
    $("#rfc").prop('disabled', true); 
    $("#homo").prop('disabled', true);  
    $("#idEstado2").prop('disabled', true);
    $("#idMunicipio2").prop('disabled', true);
    $("#idLocalidad2").prop('disabled', true);
    $("#idColonia2").prop('disabled', true);
    $("#cp2").prop('disabled', true);
    $("#calle").prop('disabled', true); 
    $("#numExterno").prop('disabled', true);
    $("#numInterno").prop('disabled', true);
    $("#docIdentificacion").prop('disabled', true);
    $("#numDocIdentificacion").prop('disabled', true);
    $("#expedido").prop('disabled', true);
    $("#tipoActa").prop('disabled', true); 
    $("#otro").prop('disabled', true);    
   

    $('#nombres2').prop('disabled', false);
    $('#rfc2').prop('disabled', false);
    $('#homo2').prop('disabled', false);
    $('#representanteLegal2').prop('disabled', false);
    $("#telefono2").prop('disabled', false); 
    $("#idEstado").prop('disabled', false); 
    $("#idMunicipio").prop('disabled', false); 
    $("#idLocalidad").prop('disabled', false); 
    $("#idColonia").prop('disabled', false); 
    $("#cp").prop('disabled', false); 
    $("#fechaAltaEmpresa").prop('disabled',false );
    $("#calle2").prop('disabled', false ); 
    $("#numExterno2").prop('disabled', false); 
    $("#numInterno2").prop('disabled', false); 
    $("#docIdentificacion2").prop('disabled',false); 
    $("#expedido2").prop('disabled', true);
    $("#numDocIdentificacion2").prop('disabled', false); 
    $("#tipoActa2").prop('disabled', false); 
    $("#otro2").prop('disabled', false); 
    

    
}



});


    
    
      
