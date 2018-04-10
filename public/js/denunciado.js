$("#tipoDenunciado1").prop("checked", false);
    $("#tipoDenunciado2").prop("checked", false);
    $("#tipoDenunciado3").prop("checked", false);
    $('#qrr').hide();
    $('#conocido').hide();
	$('#divconparecencia').hide();
    
    //Para quien resulte responsable

	$("#tipoDenunciado1").change(function(event){
        if ($('#tipoDenunciado1').is(':checked') ) {
            $('#qrr').show();
            $('#conocido').hide();
            $('#divconparecencia').hide();


             //Datos requeridos de Q.R.R.
             $('#nombresQ').prop('disabled', false);

             //Datos no requeridos de conocidos
            
             //persona
             $('#nombresC').prop('disabled', true);
             $('#primerApC').prop('disabled', true);
             $('#segundoApC').prop('disabled', true);
            //empresa
            $("#nombres2").prop('disabled', true); 
            $("#rfc2").prop('disabled', true);

            //Datos no conocidos de compadecencia

            //persona

            $("#nombres").prop('disabled', true);   
            $("#primerAp").prop('disabled', true);   
            $("#segundoAp").prop('disabled', true);   
            $("#rfc").prop('disabled', true);   
            $("#fechaNacimiento").prop('disabled', true);   
            $("#edad").prop('disabled', true);   
            $("#sexo").prop('disabled', true);   
            $("#curp").prop('disabled', true);   
            $("#idNacionalidad").prop('disabled', true);   
            $("#idEtnia").prop('disabled', true);   
            $("#idLengua").prop('disabled', true);   
            $("#idEstadoOrigen").prop('disabled', true);   
            $("#idMunicipioOrigen").prop('disabled', true);   
            $("#telefono").prop('disabled', true);   
            $("#motivoEstancia").prop('disabled', true);   
            $("#idOcupacion").prop('disabled', true);   
            $("#idEstadoCivil").prop('disabled', true);   
            $("#idReligion").prop('disabled', true);   
            $("#idEscolaridad").prop('disabled', true);   
            $("#docIdentificacion").prop('disabled', true);   
            $("#numDocIdentificacion").prop('disabled', true);

            //empresa
            $("#nombres3").prop('disabled', true); 
            $("#rfc3").prop('disabled', true);
            $("#fechaAltaEmpresa").prop('disabled', true); 
            $("#representanteLegal").prop('disabled', true);

            //tiposde persona
            $("#esEmpresa1").prop('disabled', true);
            $("#esEmpresa2").prop('disabled', true);
            $("#esEmpresaA").prop('disabled', true);
            $("#esEmpresaB").prop('disabled', true);
            



		}
		});

//Para conocido

	 $("#tipoDenunciado2").change(function(event){
        if ($('#tipoDenunciado2').is(':checked') ) {
            $('#qrr').hide();
            $('#conocido').show();
			$('#divconparecencia').hide();
        }
        
        $("#esEmpresa1").prop("checked", false);
        $("#esEmpresa2").prop("checked", false);
        $('#persona-conocida').hide();
        $('#empresa-conocida').hide();
	

        $("#esEmpresa1").change(function(event){
            if ($('#esEmpresa1').is(':checked') ) {
                $('#persona-conocida').hide();
                $('#empresa-conocida').show();
               
            }
        });
        $("#esEmpresa2").change(function(event){
            if ($('#esEmpresa2').is(':checked') ) {
                $('#empresa-conocida').hide();
                $('#persona-conocida').show();
                
               
            }
        });

        //Datos requeridos de Q.R.R.
        $('#nombresQ').prop('disabled', true);

        //Datos no requeridos de conocidos
       
        //persona
        $('#nombresC').prop('disabled', false);
        $('#primerApC').prop('disabled', false);
        $('#segundoApC').prop('disabled', false);
       //empresa
       $("#nombres2").prop('disabled', false); 
       $("#rfc2").prop('disabled', false);

       //Datos no conocidos de compadecencia

       //persona

       $("#nombres").prop('disabled', true);   
       $("#primerAp").prop('disabled', true);   
       $("#segundoAp").prop('disabled', true);   
       $("#rfc").prop('disabled', true);   
       $("#fechaNacimiento").prop('disabled', true);   
       $("#edad").prop('disabled', true);   
       $("#sexo").prop('disabled', true);   
       $("#curp").prop('disabled', true);   
       $("#idNacionalidad").prop('disabled', true);   
       $("#idEtnia").prop('disabled', true);   
       $("#idLengua").prop('disabled', true);   
       $("#idEstadoOrigen").prop('disabled', true);   
       $("#idMunicipioOrigen").prop('disabled', true);   
       $("#telefono").prop('disabled', true);   
       $("#motivoEstancia").prop('disabled', true);   
       $("#idOcupacion").prop('disabled', true);   
       $("#idEstadoCivil").prop('disabled', true);   
       $("#idReligion").prop('disabled', true);   
       $("#idEscolaridad").prop('disabled', true);   
       $("#docIdentificacion").prop('disabled', true);   
       $("#numDocIdentificacion").prop('disabled', true);

       //empresa
       $("#nombres3").prop('disabled', true); 
       $("#rfc3").prop('disabled', true);
       $("#fechaAltaEmpresa").prop('disabled', true); 
       $("#representanteLegal").prop('disabled', true);

       //tiposde persona
       $("#esEmpresa1").prop('disabled', false);
       $("#esEmpresa2").prop('disabled', false);
       //compadecencia
       $("#esEmpresaA").prop('disabled', true);
       $("#esEmpresaB").prop('disabled', true);
       




});

 //Si es por comparecencia
 $("#tipoDenunciado3").change(function(event){
        if ($('#tipoDenunciado3').is(':checked') ) {
            $('#qrr').hide();
            $('#conocido').hide();
            $('#divconparecencia').show();
            console.log('hola');
        }

$("#esEmpresaA").prop("checked", false);
$("#esEmpresaB").prop("checked", false);
$('#persona-comparecencia').hide();
$('#empresa-comparecencia').hide();

$("#esEmpresaA").change(function(event){
    if ($('#esEmpresaA').is(':checked') ) {
        $('#persona-comparecencia').hide();
        $('#empresa-comparecencia').show();
        console.log('es empresa');
        
    }
});
$("#esEmpresaB").change(function(event){
    if ($('#esEmpresaB').is(':checked') ) {
        $('#empresa-comparecencia').hide();
        $('#persona-comparecencia').show();
        console.log('es PERSONA');
        
    }
});

//Datos requeridos de Q.R.R.
$('#nombresQ').prop('disabled', true);

//Datos no requeridos de conocidos

//persona
$('#nombresC').prop('disabled', true);
$('#primerApC').prop('disabled', true);
$('#segundoApC').prop('disabled', true);
//empresa
$("#nombres2").prop('disabled', true); 
$("#rfc2").prop('disabled', true);

//Datos no conocidos de compadecencia

//persona

$("#nombres").prop('disabled', false);   
$("#primerAp").prop('disabled', false);   
$("#segundoAp").prop('disabled', false);   
$("#rfc").prop('disabled', false);   
$("#fechaNacimiento").prop('disabled', false);   
$("#edad").prop('disabled', false);   
$("#sexo").prop('disabled', false);   
$("#curp").prop('disabled', false);   
$("#idNacionalidad").prop('disabled', false);   
$("#idEtnia").prop('disabled', false);   
$("#idLengua").prop('disabled', false);   
$("#idEstadoOrigen").prop('disabled', false);   
$("#idMunicipioOrigen").prop('disabled', false);   
$("#telefono").prop('disabled', false);   
$("#motivoEstancia").prop('disabled', false);   
$("#idOcupacion").prop('disabled', false);   
$("#idEstadoCivil").prop('disabled', false);   
$("#idReligion").prop('disabled', false);   
$("#idEscolaridad").prop('disabled', false);   
$("#docIdentificacion").prop('disabled', false);   
$("#numDocIdentificacion").prop('disabled', false);

//empresa
$("#nombres3").prop('disabled', false); 
$("#rfc3").prop('disabled', false);
$("#fechaAltaEmpresa").prop('disabled', false); 
$("#representanteLegal").prop('disabled', false);

//tiposde persona
$("#esEmpresa1").prop('disabled', true);
$("#esEmpresa2").prop('disabled', true);
//compadecencia
$("#esEmpresaA").prop('disabled', false);
$("#esEmpresaB").prop('disabled', false);
        
        
        
	});

