function validar(){
   var completo=0;

   //persona FÍSICA
   if ($('#nombre2').val().length == 0){
       completo=1;
       console.log("esta vacio");
        return false;
      // window.location.href=route('preregistro.create');   
   }
   if ($('#primerAp').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#segundoAp').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#fechaNacimiento').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#sexo').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#idEstadoOrigen').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#idMunicipioOrigen').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#curp').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#rfc2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#homo2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#idEstado2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#idLocalidad2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#idColonia2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#cp2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#telefono2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#calle2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#numExterno2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#numInterno2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#estadoCivil').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#escolaridad').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#ocupacion').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
if ($('#docIdentificacion').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}if ($('#numDocIdentificacion').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
// if ($('#correo2').val().length == 0){
//     completo=1;
//     console.log("esta vacio");
//      return false;
//    // window.location.href=route('preregistro.create');   
// }
if ($('#idRazon2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
   // window.location.href=route('preregistro.create');   
}
// if ($('#tipoActa').val().length == 0){
//     completo=1;
//     console.log("esta vacio");
//      return false;
//    // window.location.href=route('preregistro.create');   
// }

   else{
       console.log("esta bien ");
           	$("#pantalla").removeClass("loadPage");
         	$("#pantalla").removeClass("oculto");
        	 $("#pantalla").addClass("loadPage");
             return true;
   }
}

$(document).ready(function(){

    // $("#prueba").click(function(){
        $("form").submit(function(){
        validar();
    });


 
        
        
        // console.log("entro");
        // console.log("entro");
        // 	$("#pantalla").removeClass("loadPage");
         // 	$("#pantalla").removeClass("oculto");
        // 	 $("#pantalla").addClass("loadPage");
            //  return true;
    });
        // alert("okAY");

            


// });

        
    




    
/////////////////////////////////////////////////////////////////LO DE ARRINA SI SIRVE


// $(window).load(function(){
// 			$("#loadPage").delay(5000).fadeOut("slow");
// 		});

// 	 $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
// 	 $('.tab-pane').removeClass("active");
    

        // window.onload = function(){
        // 	var contenedor = document.getElementById('
        // 	loadPage');
        // 	contenedor.removeClass("loadPage");
        // 	contenedor.removeClass("oculto");
        // 	 contenedor.addClass("oculto");
        // 	}



    //   function cargando(){
            
    // 		var contenedor2 = document.getElementById('
    //  	loadPage');
    // 			contenedor2.removeClass("loadPage");
    // 	 	contenedor2.removeClass("oculto");
    // 	 	contenedor2.addClass("loadPage");
    // 	 }

        

