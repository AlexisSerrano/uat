$(document).ready(function () {
    $('.datotip').hide();	

    $('#Adireccion').click(function(){
        id = $(".datotip").attr("id");
       if (id==1) {
           console.log("es empresa")
           EmpresaT();  
       }else
       if (id==0) {
           console.log("es persona")
           PersonaT();
        }
     });
   });

function EmpresaT(){

    var completoTurno=0;

    if ($('#nombres2').val().length == 0){
        completoTurno=1;
        }
        if ($('#fechaAltaEmpresa').val().length == 0){
        completoTurno=1;
        }
        if ($('#rfc2').val().length == 0){
        completoTurno=1;
        }
        if ($('#homo2').val().length == 0){
        completoTurno=1;
        }
        if ($('#representanteLegal').val().length == 0){
        completoTurno=1;
        }
        if (completoTurno==1) {

            toastr.error("Complete los campos faltantes para poder avanzar");
        }else{
        if (completoTurno==0) {
            $('.nav-link').removeClass("active");
            $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
            $('#direccion').addClass("show");
    console.log("todo bien!")
         }
            
        }
 }   

function PersonaT(){

    var completoP=0;
    if ($('.turnopersona').hasClass('error')){
        toastr.error("Existen errores en los campos, favor de verificarlos.");
    }
    if ($('#idEstadoOrigen').val().length == 0){
        completoP=1;
        toastr.warning("Entidad Federativa de origen faltante")
    }
    if ($('#idMunicipioOrigen').val().length == 0){
        toastr.warning("Municipio de origen faltante")
         completoP=1;
    }
    if ($('.turnopersona').val().length == 0){
        completo=1;
        toastr.error("Complete los campos faltantes para poder avanzar");
       }
    
    else{
        if (completoP==0) {
            $('.nav-link').removeClass("active");//Quito la clase active al tab actual
            $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
            $('#direccion').addClass("show");
            console.log("todo COMPLETO")}
        }
    }

    
    $('#ANotificaciones2').click(function(){
        validardirec();
    });

    function validardirec(){

        var validardirec=0;
        if ($('#idEstado').val().length == 0){
            validardirec=1;}
        if ($('#idMunicipio').val().length == 0){
            validardirec=1;}
        if ($('#idLocalidad').val().length == 0){
        validardirec=1;
        }
        if ($('#idColonia').val().length == 0){
        validardirec=1;
        }
        if ($('#cp').val().length == 0){
        validardirec=1;
        }
        if ($('#calle').val().length == 0){
        validardirec=1;
        }
        // if ($('#numExterno').val().length == 0){
        // validardirec=1;
        // }
        if (validardirec==1) {

            toastr.error("Complete los campos faltantes para poder avanzar");
            }


        else{
            if (validardirec==0) {
                $('.nav-link').removeClass("active");//Quito la clase active al tab actual
                $('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
            $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
            $('.tab-pane').removeClass("show");
            $('#dirnotificacion').addClass("active");
            $('#dirnotificacion').addClass("show");
            console.log('a notificaciones')
            }
        }
    }

    $('#aDenunciante').click(function(){
        validarNoti();
    });
    function validarNoti(){
        var validarNoti=0;

        // if ($('#correo').val().length == 0){
        //     validarNoti=1;
        // }

        // if ($('#correo').hasClass('error')){
        //     validarNoti=1;
        //     toastr.error("Por favor verifique el campo de correo electronico.");
        // }
            

        if ($('#telefonoN').val().length == 0){
            validarNoti=1;
        }
        // if ($('#fax').val().length == 0){
        //     validarNoti=1;
        // }
        if (validarNoti==1) {

            toastr.error("Complete los campos faltantes para poder avanzar");
        }else if (validarNoti==0) {
                $('.nav-link').removeClass("active");
                $('#denunciante-tab').addClass("active");//Agrego la clase active al tab actual
                $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
                $('.tab-pane').removeClass("show");
                $('#denunciante').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
                $('#denunciante').addClass("show");
                console.log('adelante')
                
            
            }
    }

    $('#Atrabajo').click(function(){
        validDom();
    });

function validDom(){
    var validDom=0;

    if ($('#idEstado').val().length == 0){
        validDom=1;
    }

    if ($('#idMunicipio').hasClass('error')){
        validDom=1;
        toastr.error("Por favor verifique el campo de correo electronico.");
    }
        

    if ($('#idLocalidad').val().length == 0){
        validDom=1;
    }
    if ($('#idColonia').val().length == 0){
        validDom=1;
    }
    if ($('#cp').val().length == 0){
        validDom=1;
    }
    if ($('#calle').val().length == 0){
        validDom=1;
    }
    // if ($('#numExterno').val().length == 0){
    //     validDom=1;
    // }
    if (validDom==1) {

        toastr.error("Complete los campos faltantes para poder avanzar");
    }else if (validDom==0) {
        $('.nav-link').removeClass("active");
        $('#trabajo-tab').addClass("active");//Agrego la clase active al tab actual
        $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
        $('.tab-pane').removeClass("show");
        $('#trabajo').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
		$('#trabajo').addClass("show");
		
    }

}

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

$('#ANotificaciones').click(function(){
    datTrabajo();
});
function datTrabajo(){
var trabajo=0;

if ($('#sinEmpleo').val().length == 0){
    trabajo=1;
    toastr.warning("Complere el campo de sin empleo para poder continuar");
    }
else if ($('#sinEmpleo').val()=='NO') {
       
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
        // if ($('#numExterno2').val().length == 0){
        // trabajo=1;
        // }
    else{
        if (trabajo==0) {
        

    $('.nav-link').removeClass("active");
    $('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
    $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
    $('.tab-pane').removeClass("show");
    $('#dirnotificacion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
    $('#dirnotificacion').addClass("show");
    console.log('pasaaaaaa');
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
    
    

		
		


    

    
	