function validar(){
   var completo=0;

   //persona FÍSICA
   if ($('#nombre2').val().length == 0){
       completo=1;
       console.log("esta vacio");
        return false;
        completo=0;
      // window.location.href=route('preregistro.create');   
   }
   if ($('#primerAp').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#segundoAp').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#fechaNacimiento').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#sexo').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#idEstadoOrigen').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#idMunicipioOrigen').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#curp').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#rfc2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#homo2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#idEstado2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#idLocalidad2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#idColonia2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;
   // window.location.href=route('preregistro.create');   
}
if ($('#cp2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0; // window.location.href=route('preregistro.create');   
}
if ($('#telefono2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0; // window.location.href=route('preregistro.create');   
}
if ($('#calle2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#numExterno2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#numInterno2').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#estadoCivil').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#escolaridad').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#ocupacion').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#docIdentificacion').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
}if ($('#numDocIdentificacion').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
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
     completo=0;// window.location.href=route('preregistro.create');   
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

function validarempresa(){
  var completo=0;
   //modulo empresa
if ($('#nombre1').val().length == 0){
  completo=1;
  console.log("esta vacio");
   return false;
   completo=0;// window.location.href=route('preregistro.create');   
}

if ($('#fechaAltaEmpresa').val().length == 0){
 completo=1;
 console.log("esta vacio");
  return false;
  completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#rfc1').val().length == 0){
 completo=1;
 console.log("esta vacio");
  return false;
  completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#homo1').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
   }
   if ($('#repLegal').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
   }
   if ($('#telefono1').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0; // window.location.href=route('preregistro.create');   
   }
   if ($('#idEstado').val().length == 0){
    completo=1;
    console.log("esta vacio");
     return false;
     completo=0;// window.location.href=route('preregistro.create');   
   }
if ($('#idMunicipio').val().length == 0){
 completo=1;
 console.log("esta vacio");
  return false;
  completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#idLocalidad').val().length == 0){
 completo=1;
 console.log("esta vacio");
  return false;
  completo=0;// window.location.href=route('preregistro.create');   
}

if ($('#idColonia').val().length == 0){
 completo=1;
 console.log("esta vacio");
  return false;
  completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#cp').val().length == 0){
 completo=1;
 console.log("esta vacio");
  return false;
  completo=0;// window.location.href=route('preregistro.create');   
}

if ($('#calle1').val().length == 0){
 completo=1;
 console.log("esta vacio");
  return false;
  completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#numExterno1').val().length == 0){
 completo=1;
 console.log("esta vacio");
  return false;
  completo=0;// window.location.href=route('preregistro.create');   
}
if ($('#numInterno1').val().length == 0){
 completo=1;
 console.log("esta vacio");
  return false;
  completo=0;// window.location.href=route('preregistro.create');   
}
// if ($('#correo').val().length == 0){
//     completo=0;
//     console.log("esta vacio");
//     return true;
//     // completo=0;
//     // window.location.href=route('preregistro.create');   
// }
if ($('#idRazon1').val().length == 0){
 completo=1;
 console.log("esta vacio");
  return false;
  completo=0;// window.location.href=route('preregistro.create');   
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




$(document).ready(function()
{
    $("#esEmpresa1").change(function(event){
        if($("#esEmpresa1").is(':checked')){
            $("form").submit(function()
            {
                validarempresa();
                console.log("Es empresa");
            });
        }

    });
    $("#esEmpresa2").change(function(event){
        if($("#esEmpresa2").is(':checked')){
            $("form").submit(function()
            {
                validar();
                console.log("NO empresa");
            });
        }

    });


    // $("#prueba").click(function(){
      // $("input[name=esEmpresa]").Ifselect(function()
      // {
      //   valor = $('input[name=esEmpresa]:checked').val();
      //   if (valor==1)
      //   {//1espersona moral
      //     $("form").submit(function()
      //     {
      //       validarempresa();
      //       console.log("Es empresa");
      //     });
      //   }
      //   else if(valor==0)
      //   {
      //     $("form").submit(function()
      //     {
      //       validar();
      //     });
      //   }
      // });
});
        // alert("okAY");

            




        
    // sql = "select idvehiculo as ID, numeroeconomico as ECONOMICO," +
    // " placas as PLACAS, noserie as SERIE, marca as MARCA, modelo as MODELO "




    
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

        

