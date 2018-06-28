

//Datos personales-direccion
        $('#Adireccion').click(function(){
        //es para empresa
            if ($('#esEmpresa1').is(':checked') ) {
                    console.log('entra empresa')
                    validarEmpresa();
            }
            else{
                    console.log('entra persona')
                    validarPersona();  
            }	
        });
        function validarEmpresa(){

        var completo=0;

                if ($('#nombres2').val().length == 0){
                completo=1;
                
                }
                if ($('#fechaAltaEmpresa').val().length == 0){
                completo=1;
                }
                if ($('#rfc2').val().length == 0){
                completo=1;
                }
                if ($('#homo2').val().length == 0){
                completo=1;
                }
                if ($('#representanteLegal').val().length == 0){
                completo=1;
                }
        else{
            
            if (completo==0) {
                $('.nav-link').removeClass("active");
                $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
                $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                $('.tab-pane').removeClass("show");
                $('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                $('#direccion').addClass("show");
                completo=2;
                console.log("todo bien hecho en todos lo sentidos!")
            }
        }   

     if (completo==1) {
            toastr.error("Complete los campos faltantes para poder avanzar");
        }
}
        function validarPersona(){

        var completoP=0;
        if ($('#nombres').val().length == 0){
        completoP=1;
        }
        if ($('#primerAp').val().length == 0){
            completoP=1;
        }
        if ($('#fechaNacimiento').val().length == 0){
            completoP=1;
                toastr.warning("Complete el campo de fecha de nacimiento");
                
        }
        if ($('#idEstadoOrigen').val().length == 0){
            completoP=1;
        }
        if ($('#idMunicipioOrigen').val().length == 0){
            completoP=1;
         }
        if ($('#sexo').val().length == 0){
                completoP=1;
         }
         if ($('#curp').val().length == 0){
            completoP=1;
        }
        if ($('#idNacionalidad').val().length == 0){
                completoP=1;
        }
        if ($('#idEtnia').val().length == 0){
                completoP=1;
        }
        if ($('#idLengua').val().length == 0){
                    completoP=1;
         }
        // if ($('#telefono').val().length == 0){
        //         completoP=1;
        // }
        
        if ($('#idOcupacion').val().length == 0){
            completoP=1;
        }
        if ($('#idEstadoCivil').val().length == 0){
            completoP=1;
        }
        if ($('#idReligion').val().length == 0){
            completoP=1;
        }
        if ($('#idEscolaridad').val().length == 0){
                completoP=1;
        }
        if ($('#docIdentificacion').val().length == 0){
            completoP=1;
        }
        if ($('#numDocIdentificacion').val().length == 0){
                completoP=1;
         }  

 else{
            if (completoP==0) {
                $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
                $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                $('.tab-pane').removeClass("show");
                $('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                $('#direccion').addClass("show");
                console.log("todo bien")
            }
        }
 if (completoP==1) {
        toastr.error("Complete los campos faltantes para poder avanzar");
        }
    }

        $('#Atrabajo').click(function(){
        validarDirec();
        });

        function validarDirec(){
        var direcciones=0;
        if ($('#idEstado').val().length == 0){
        direcciones=1;
        }
        if ($('#idMunicipio').val().length == 0){
        direcciones=1;
        }
        if ($('#idLocalidad').val().length == 0){
        direcciones=1;
        }
        if ($('#idColonia').val().length == 0){
        direcciones=1;
        }
        if ($('#cp').val().length == 0){
        direcciones=1;
        }
        if ($('#calle').val().length == 0){
        direcciones=1;
        }
        // if ($('#numExterno').val().length == 0){
        // direcciones=1;
        // }

        else{
            if (direcciones==0) {
                if ($('#esEmpresa1').is(':checked') ) {
                $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                    $('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
                    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                    $('.tab-pane').removeClass("show");
                    $('#dirnotificacion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                    $('#dirnotificacion').addClass("show");
                    console.log('a notificaciones')
                }
                else{
                $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                $('#trabajo-tab').addClass("active");//Agrego la clase active al tab actual
                $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                $('.tab-pane').removeClass("show");
                $('#trabajo').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                $('#trabajo').addClass("show");
                console.log('a trabajo')
                }        
                
            }
        }
     if (direcciones==1) {
                toastr.error("Complete los campos faltantes para poder avanzar");
            }
        }

        $('#ANotificaciones').click(function(){
        validarTrabajo();
        });

        $("#sinEmpleo").bind("change",function(){
            if ($('#sinEmpleo').val()=='SI'){
   
                $('#lugarTrabajo').prop('disabled', true);
                $('#telefonoTrabajo').prop('disabled', true);
                $('#idEstado2').prop('disabled', true);
                $('#idMunicipio2').prop('disabled', true);
                $('#idLocalidad2').prop('disabled', true);
                $('#idColonia2').prop('disabled', true);
                $('#cp2').prop('disabled', true);
                $('#calle2').prop('disabled', true);
                $('#numExterno2').prop('disabled', true);
                $('#numInterno2').prop('disabled', true);
               }
            else{
                if ($('#sinEmpleo').val()=='NO'){
                    $('#lugarTrabajo').prop('disabled', false);
                    $('#telefonoTrabajo').prop('disabled', false);
                    $('#idEstado2').prop('disabled', false);
                    $('#idMunicipio2').prop('disabled', false);
                    $('#idLocalidad2').prop('disabled', false);
                    $('#idColonia2').prop('disabled', false);
                    $('#cp2').prop('disabled', false);
                    $('#calle2').prop('disabled', false);
                    $('#numExterno2').prop('disabled', false);
                    $('#numInterno2').prop('disabled', false);

                }
            }
       } );

        function validarTrabajo(){
        var trabajo=0;
        
        if ($('#sinEmpleo').val().length == 0){
            trabajo=1;
            toastr.warning("Complete el campo de sin empleo para poder continuar");
            }
       else if ($('#sinEmpleo').val()=='NO') {
               
                if ($('#lugarTrabajo').val().length == 0){
                trabajo=1;
                }
                // if ($('#telefonoTrabajo').val().length == 0){
                // trabajo=1;
                // }
                if ($('#idEstado2').val().length == 0){
                trabajo=1;
                }
                if ($('#idMunicipio2').val().length == 0){
                trabajo=1;
                }
                if ($('#idLocalidad2').val().length == 0){
                trabajo=1;
                }
                if ($('#idColonia2').val().length == 0){
                trabajo=1;
                }
                if ($('#cp2').val().length == 0){
                trabajo=1;
                }
                if ($('#calle2').val().length == 0){
                trabajo=1;
                }
                // if ($('#numExterno2').val().length == 0){
                // trabajo=1;
                // }
            else{
                if (trabajo==0) {
                
                    $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                    $('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
                    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                    $('.tab-pane').removeClass("show");
                    $('#dirnotificacion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                    $('#dirnotificacion').addClass("show");
                    console.log('a notificaciones')
                }
                

            }
            if (trabajo==1) {
                toastr.error("Complete los campos faltantes para poder avanzar");
     }
            
        }

        
        else{
             if ($('#sinEmpleo').val()=='SI') {
                
                    $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                    $('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
                    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                    $('.tab-pane').removeClass("show");
                    $('#dirnotificacion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                    $('#dirnotificacion').addClass("show");
                    console.log('a notificaciones')
             }
            
        }
        
     }

    

        $('#ANotificaciones2').click(function(){
        validarDirec();
        });



        $('#Adenunciante').click(function(){
        validarNotificaciones();
        });
        function validarNotificaciones(){
        var notificaciones=0;

                if ($('#idEstado3').val().length == 0){
                notificaciones=1;
                }
                if ($('#idMunicipio3').val().length == 0){
                notificaciones=1;
                }
                if ($('#idLocalidad3').val().length == 0){
                notificaciones=1;
                }
                if ($('#idColonia3').val().length == 0){
                notificaciones=1;
                }
                if ($('#cp3').val().length == 0){
                notificaciones=1;
                }
                if ($('#calle3').val().length == 0){
                notificaciones=1;
                }
                // if ($('#numExterno3').val().length == 0){
                // notificaciones=1;
                // }
                // if ($('#correo').val().length == 0){
                // notificaciones=1;
                // }
                if ($('#telefonoN').val().length == 0){
                notificaciones=1;

               }
        else{
            if (notificaciones==0) {
                
                $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                $('#denunciante-tab').addClass("active");//Agrego la clase active al tab actual
                $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                $('.tab-pane').removeClass("show");
                $('#denunciante').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                $('#denunciante').addClass("show");
                console.log('na')
            }
        }
         if (notificaciones==1) {
                toastr.error("Complete los campos faltantes para poder avanzar");
            }
        }

        $('#Adenunciado').click(function(){
        validarNotificaciones2();
        });

        function validarNotificaciones2(){
            var notificaciones=0;
    
                if ($('#idEstado3').val().length == 0){
                notificaciones=1;
                }
                if ($('#idMunicipio3').val().length == 0){
                notificaciones=1;
                }
                if ($('#idLocalidad3').val().length == 0){
                notificaciones=1;
                }
                if ($('#idColonia3').val().length == 0){
                notificaciones=1;
                }
                if ($('#cp3').val().length == 0){
                notificaciones=1;
                }
                if ($('#calle3').val().length == 0){
                notificaciones=1;
                }
                // if ($('#numExterno3').val().length == 0){
                // notificaciones=1;
                // }
                // if ($('#correo').val().length == 0){
                // notificaciones=1;
                // }
                if ($('#telefonoN').val().length == 0){
                notificaciones=1;}
    else{
        if (notificaciones==0) {
            
            $('.nav-link').removeClass("active");//Quito la clase active al tab actual
            $('#denunciado-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#denunciado').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
            $('#denunciado').addClass("show");
            console.log('na')
        }
    }
    if (notificaciones==1) {
            toastr.error("Complete los campos faltantes para poder avanzar");
        }
    }

    function validarNotDenunciado(){
    var notificaciones=0;

        if ($('#idEstado3').val().length == 0){
            notificaciones=1;
            }
        if ($('#idMunicipio3').val().length == 0){
            notificaciones=1;
            }
        if ($('#idLocalidad3').val().length == 0){
            notificaciones=1;
            }
        if ($('#idColonia3').val().length == 0){
            notificaciones=1;
            }
        if ($('#cp3').val().length == 0){
            notificaciones=1;
            }
        if ($('#calle3').val().length == 0){
            notificaciones=1;
            }
        // if ($('#numExterno3').val().length == 0){
        //     notificaciones=1;
        //     }
        // if ($('#correo').val().length == 0){
        // notificaciones=1;
        // }
        if ($('#telefonoN').val().length == 0){
        notificaciones=1;}
    else{
            if (notificaciones==0) {
                
                $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                $('#denunciado-tab').addClass("active");//Agrego la clase active al tab actual
                $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                $('.tab-pane').removeClass("show");
                $('#denunciado').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                $('#denunciado').addClass("show");
                console.log('nan')
            }
        }
            if (notificaciones==1) {
                toastr.error("Complete los campos faltantes para poder avanzar");
            }
        }

        $('#guardarDenunciante').click(function(){
        validarDatosDenunciante();
        });

    function validarDatosDenunciante(){
    var datosDenunciante=0;

        if ($('#reguardarIdentidad').val().length == 0){
            datosDenunciante=1;
            }
        if ($('#narracion').val().length == 0){
            datosDenunciante=1;
            }
            if ($('#victima').val().length == 0){
                datosDenunciante=1;
                }
        if (datosDenunciante==1) {
            toastr.error("Complete los campos faltantes para poder guardar");
        }
    }

    $('#Aautoridad').click(function(){
    validarTrabajo3();
    });

    function validarTrabajo3(){
        var trabajo=0;
            if ($('#lugarTrabajo').val().length == 0){
            trabajo=1;
            }
            // if ($('#telefonoTrabajo').val().length == 0){
            // trabajo=1;
            // }
            if ($('#idEstado2').val().length == 0){
            trabajo=1;
            }
            if ($('#idMunicipio2').val().length == 0){
            trabajo=1;
            }
            if ($('#idLocalidad2').val().length == 0){
            trabajo=1;
            }
            if ($('#idColonia2').val().length == 0){
            trabajo=1;
            }
            if ($('#cp2').val().length == 0){
            trabajo=1;
            }
            if ($('#calle2').val().length == 0){
            trabajo=1;
            }
            // if ($('#numExterno2').val().length == 0){
            // trabajo=1;
            // }
     else{
            if (trabajo==0) {
                    
                    $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                    $('#autoridad-tab').addClass("active");//Agrego la clase active al tab actual
                    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                    $('.tab-pane').removeClass("show");
                    $('#autoridad').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                    $('#autoridad').addClass("show");
                    console.log('a notificaciones')
             }
    }
     if (trabajo==1) {
                    toastr.error("Complete los campos faltantes para poder avanzar");}
     }

        //ABOGADO
            $('#Atrabajo2').click(function(){
            validarPersona2();
            });
            function validarPersona2(){

                var completoP=0;
                if ($('.persona').val().length == 0){
                completoP=1;
                }
         else{
                if (completoP==0) {
                    $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                    $('#trabajo-tab').addClass("active");//Agrego la clase active al tab actual
                    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                    $('.tab-pane').removeClass("show");
                    $('#trabajo').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                    $('#trabajo').addClass("show");
                    console.log("todo bien")}
                        
             }
             if (completoP==1) {
                toastr.error("Complete los campos faltantes para poder avanzar");
            }
    }

            $('#aAbogado').click(function(){
            validarTrabajo2();
            });
            function validarTrabajo2(){
                var trabajo=0;
                if ($('#lugarTrabajo').val().length == 0){
                trabajo=1;
                }
                // if ($('#telefonoTrabajo').val().length == 0){
                // trabajo=1;
                // }
                if ($('#idEstado2').val().length == 0){
                trabajo=1;
                }
                if ($('#idMunicipio2').val().length == 0){
                trabajo=1;
                }
                if ($('#idLocalidad2').val().length == 0){
                trabajo=1;
                }
                if ($('#idColonia2').val().length == 0){
                trabajo=1;
                }
                if ($('#cp2').val().length == 0){
                trabajo=1;
                }
                if ($('#calle2').val().length == 0){
                trabajo=1;
                }
                // if ($('#numExterno2').val().length == 0){
                // trabajo=1;
                // }
                else{
                    if (trabajo==0) {
                        
                        $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                        $('#abogado-tab').addClass("active");//Agrego la clase active al tab actual
                        $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                        $('.tab-pane').removeClass("show");
                        $('#abogado').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                        $('#abogado').addClass("show");
                        
                        console.log('a notificaciones')
                    }
                }
                if (trabajo==1) {
                        toastr.error("Complete los campos faltantes para poder avanzar");
                    }
            }

            $('#aDelito').click(function(){
            validarDelito();
            });       

            function validarDelito(){
            var valDelito=0;

            if ($('.delito').val().length == 0){
                valDelito=1;
                
            }
            else{
                if (valDelito==0) {
                    
                    $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                    $('#dirdelito-tab').addClass("active");//Agrego la clase active al tab actual
                    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                    $('.tab-pane').removeClass("show");
                    $('#dirdelito').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                    $('#dirdelito').addClass("show"); 
                }
            }
             if (valDelito==1) {
                    toastr.error("Complete los campos faltantes para poder avanzar");
                }

        }

        $('#aDelito2').click(function(){
            validarDirec();
            validarDelito2();

        });

        /**-----------------BOTONES ATRÁS-------------------------------------------- */

        $('#irpersonales').click(function(){
            $('.nav-link').removeClass("active");
            $('#personales-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#personales').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
            $('#personales').addClass("show");
            console.log('boton atrás')
        });
        
        $('#adireccion2').click(function(){
            $('.nav-link').removeClass("active");
            $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
            $('#direccion').addClass("show");
            console.log('boton atrás')
        });
        $('#irdireccion').click(function(){
            $('.nav-link').removeClass("active");
            $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
            $('#direccion').addClass("show");
            console.log('boton atrás')
        });
        $('#atrabajo2').click(function(){
            $('.nav-link').removeClass("active");
            $('#trabajo-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#trabajo').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
            $('#trabajo').addClass("show");
            console.log('boton atrás')
        });
    
        $('#irdirnotificacion').click(function(){
            $('.nav-link').removeClass("active");
            $('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#dirnotificacion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
            $('#dirnotificacion').addClass("show");
            console.log('boton atrás')
        });
        
/*************************    atrás abogados        ************************************************** */
$('#irtrabajo').click(function(){
    $('.nav-link').removeClass("active");//Quito la clase active al tab actual
    $('#trabajo-tab').addClass("active");//Agrego la clase active al tab actual
    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
    $('.tab-pane').removeClass("show");
    $('#trabajo').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
    $('#trabajo').addClass("show");
});

$('#irpersonales').click(function(){
    $('.nav-link').removeClass("active");//Quito la clase active al tab actual
    $('#personales-tab').addClass("active");//Agrego la clase active al tab actual
    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
    $('.tab-pane').removeClass("show");
    $('#personales').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
    $('#personales').addClass("show");
});

