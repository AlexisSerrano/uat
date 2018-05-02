//agregar denunciante
// $(document).ready(function(){

    // if ($('#esEmpresa1').is(':checked') ) {

    //     $('.nav-link').removeClass("active");//quitamos clases de activo
    //         $('#direccion-tab').addClass("disabled");
    //         $('#trabajo-tab').addClass("disabled");
    //         $('#dirnotificacion-tab').addClass("disabled");
    //         $('#denunciante-tab').addClass("disabled");
    //         $('#personales-tab').addClass("active");

    



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
    
    if ($('.empresa').val().length == 0){
       completo=1;
    }
    else{
        
    $('.nav-link').removeClass("active");
    $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
    $('.tab-pane').removeClass("show");
    $('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
    $('#direccion').addClass("show");
    completo=2;
    console.log("todo bien!")
    }

    if (completo==1) {
        
    toastr.error("Complete los campos faltantes para poder avanzar");
    }
    
}   
    function validarPersona(){

    var completoP=0;
    if ($('.persona').val().length == 0){
        completoP=1;
    }
    else{
    $('.nav-link').removeClass("active");//Quito la clase active al tab actual
    $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
    $('.tab-pane').removeClass("show");
    $('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
    $('#direccion').addClass("show");
    console.log("todo bien")}

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
    if ($('#numExterno').val().length == 0){
        direcciones=1;
        }

    else{
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
if (direcciones==1) {
    toastr.error("Complete los campos faltantes para poder avanzar");
}
}

// $('#ANotificaciones2').click(function(){
   
//         $('.nav-link').removeClass("active");//Quito la clase active al tab actual
//                 $('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
//                 $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
//                 $('.tab-pane').removeClass("show");
//                 $('#dirnotificacion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
//                 $('#dirnotificacion').addClass("show");
//                 console.log('a notificaciones')

    

//  });

 $('#ANotificaciones').click(function(){
    validarTrabajo();
});


function validarTrabajo(){
    var trabajo=0;
        if ($('#lugarTrabajo').val().length == 0){
        trabajo=1;
        }
        if ($('#telefonoTrabajo').val().length == 0){
            trabajo=1;
            }
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
        if ($('#numExterno2').val().length == 0){
            trabajo=1;
            }
        else{
            $('.nav-link').removeClass("active");//Quito la clase active al tab actual
            $('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#dirnotificacion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
            $('#dirnotificacion').addClass("show");
            console.log('a notificaciones')
        }
        if (trabajo==1) {
            toastr.error("Complete los campos faltantes para poder avanzar");
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
        if ($('#numExterno3').val().length == 0){
            notificaciones=1;
            }
        if ($('#correo').val().length == 0){
        notificaciones=1;
        }
        if ($('#telefonoN').val().length == 0){
        notificaciones=1;
        
        }
        else{
        $('.nav-link').removeClass("active");//Quito la clase active al tab actual
        $('#denunciante-tab').addClass("active");//Agrego la clase active al tab actual
        $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
        $('.tab-pane').removeClass("show");
        $('#denunciante').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
        $('#denunciante').addClass("show");
        console.log('na')
        }
        if (notificaciones==1) {
            toastr.error("Complete los campos faltantes para poder avanzar");
        }
    }

    $('#Adenunciado').click(function(){
        validarNotificaciones();
    });

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
            if ($('#numExterno3').val().length == 0){
                notificaciones=1;
                }
            if ($('#correo').val().length == 0){
            notificaciones=1;
            }
            if ($('#telefonoN').val().length == 0){
            notificaciones=1;
            
            }
            else{
            $('.nav-link').removeClass("active");//Quito la clase active al tab actual
            $('#denunciado-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#denunciado').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
            $('#denunciado').addClass("show");
            console.log('nan')
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
            validarTrabajo();
        });

        $('#Atrabajo2').click(function(){
            validarPersona();
            });

            $('#aAbogado').click(function(){
                validarTrabajo();
            });

        // });

//tabs

// if ($('#esEmpresa1').is(':checked') ) {

    
    
    


















// function valDomEmpresa(){

//     var completoDE=0;

    
        
    // $('.irtrabajo').click(function(){
    //     $('.nav-link').removeClass("active");//Quito la clase active al tab actual
    //     $('#trabajo-tab').addClass("active");//Agrego la clase active al tab actual
    //     $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
    //     $('.tab-pane').removeClass("show");
    //     $('#trabajo').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
    //     $('#trabajo').addClass("show");
    // });

$('.irpersonales').click(function(){
    // $('.nav-link').removeClass("active");//Quito la clase active al tab actual
    // $('#personales-tab').addClass("active");//Agrego la clase active al tab actual
    // $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
    // $('.tab-pane').removeClass("show");
    // $('#personales').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
    // $('#personales').addClass("show");
});

// $('.irdirnotificacion').click(function(){
//     $('.nav-link').removeClass("active");//Quito la clase active al tab actual
//     $('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
//     $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
//     $('.tab-pane').removeClass("show");
//     $('#dirnotificacion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
//     $('#dirnotificacion').addClass("show");
// });

// $('.irdenunciante').click(function(){
//     $('.nav-link').removeClass("active");//Quito la clase active al tab actual
//     $('#denunciante-tab').addClass("active");//Agrego la clase active al tab actual
//     $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
//     $('.tab-pane').removeClass("show");
//     $('#denunciante').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
//     $('#denunciante').addClass("show");
// });