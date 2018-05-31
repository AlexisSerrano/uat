$(document).ready(function(){

		
    $('#nombre2').focusout(function(){
var campo = $(this).val();
if (campo.length < 3 || campo.length > 200){
    $(this).css({"border-color":"red"});
    $("#invalid-nombres").show();
}else{
    $(this).css({"border-color":"green"});
    $("#invalid-nombres").hide();
}
});



$('#primerAp').focusout(function(){
console.log("se activo");
var campo = $(this).val();
if (campo.length < 3 || campo.length > 50){
    $(this).css({"border-color":"red"});
    $("#invalid-primerAp").show();
}else{
    $(this).css({"border-color":"green"});
    $("#invalid-primerAp").hide();
}
});

$('#segundoAp').focusout(function(){
var campo = $(this).val();
if (campo.length < 3 || campo.length > 50){
    $(this).css({"border-color":"red"});
    $("#invalid-segundoAp").show();
}else{
    $(this).css({"border-color":"green"});
    $("#invalid-segundoAp").hide();
}
});

$('#fechaNacimiento').focusout(function(){
var campo = $(this).val();
if (campo.length < 10 || campo.length > 10){
    $(this).css({"border-color":"red"});
    $("#invalid-fechaNAcimiento").show();
}else{
    $(this).css({"border-color":"green"});
    $("#invalid-fechaNAcimiento").hide();
}
});

$('#telefono2').focusout(function(){
var campo = $(this).val();
if (campo.length < 7 || campo.length > 15){
    $(this).css({"border-color":"red"});
    $("#invalid-telefono").show();
}else{
    $(this).css({"border-color":"green"});
    $("#invalid-telefono").hide();
}
});

$('#rfc2').focusout(function(){
var campo = $(this).val();
if (campo.length < 10 || campo.length > 200){
    $(this).css({"border-color":"red"});
    $("#invalid-rfc2").show();
}else{
    $(this).css({"border-color":"green"});
    $("#invalid-rfc2").hide();
}
});

$('#narracion').focusout(function(){
var narraVal = $(this).val();
if (narraVal===''){
$(this).css({"border-color":"red"});
  
}else{
$(this).css({"border-color":"green"});
}
});

$('#numInterno2').focusout(function(){
var campo = $(this).val();
if (campo ===''){
    $(this).css({"border-color":"yellow"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#numExterno2').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"yellow"})
}
});

$('#numDocIdentificacion').focusout(function(){
var campo = $(this).val();
if (campo.length < 1 || campo.length > 30){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"yellow"})
}
});

$('#sexo').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});


$('#curp').focusout(function(){
var campo = $(this).val();
if (campo.length <5  || campo.length > 20){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#idEstado2').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#idMunicipio2').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});



$('#idLocalidad2').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#cp2').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#idColonia2').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});


$('#calle2').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#docIdentificacion').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#idRazon2').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#edad').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});


///EMPRESA



$('#nombre1').focusout(function(){
var campo = $(this).val();
if (campo.length < 3 || campo.length > 200){
    $(this).css({"border-color":"red"});
    $("#invalid-nombres").show();
}else{
    $(this).css({"border-color":"green"});
    $("#invalid-nombres").hide();
}
});

$('#rfc1').focusout(function(){
var campo = $(this).val();
if (campo.length < 10 || campo.length > 200){
    $(this).css({"border-color":"red"});
    $("#invalid-rfc2").show();
}else{
    $(this).css({"border-color":"green"});
    $("#invalid-rfc2").hide();
}
});

$('#repLegal').focusout(function(){
var repreVal = $(this).val();
if (repreVal ===''){
 $(this).css({"border-color":"red"});
}else{
 $(this).css({"border-color":"green"});

}
});

$('#telefono1').focusout(function(){
var campo = $(this).val();
if (campo.length < 7 || campo.length > 15){
    $(this).css({"border-color":"red"});
    $("#invalid-telefono").show();
}else{
    $(this).css({"border-color":"green"});
    $("#invalid-telefono").hide();
}
});


$('#idEstado1').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#idMunicipio1').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});



$('#idLocalidad1').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#cp1').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#idColonia1').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});


$('#calle1').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});


$('#numInterno1').focusout(function(){
var campo = $(this).val();
if (campo ===''){
    $(this).css({"border-color":"yellow"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#numExterno1').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"yellow"})
}
});

$('#idRazon1').focusout(function(){
var campo = $(this).val();
if (campo.length <1  || campo.length > 10){
    $(this).css({"border-color":"red"});

}else{
    $(this).css({"border-color":"green"})
}
});

$('#idEtnia').focusout(function(){

});


///para validar solo por necesario o innecesario

$('.necesario').focusout(function(){
var campo = $(this).val();
if (campo===''){
    $(this).css({"border-color":"red"});
    //$("#invalid-nombres").show();
}else{
    $(this).css({"border-color":"green"});
    //$("#invalid-nombres").hide();
}
});

    $('.innecesario').focusout(function(){
var campo = $(this).val();
if (campo===''){
    $(this).css({"border-color":"amarillo"});
    $("#invalid-nombres").show();
}else{
    $(this).css({"border-color":"green"});
    $("#invalid-nombres").hide();
}
});

$('#nombres').focusout(function(){

var campo = $(this).val();
if (campo.length < 3 || campo.length > 200){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#rfc').focusout(function(){

var campo = $(this).val();
if (campo.length < 3 || campo.length > 200){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idNacionalidad').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idEtnia').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idLengua').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});

$('#idEstadoOrigen').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idMunicipioOrigen').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#telefono').focusout(function(){

var campo = $(this).val();
if (campo.length < 3 || campo.length > 200){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});

$('#motivoEstancia').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});

$('#idOcupacion').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idEstadoCivil').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idReligion').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idEscolaridad').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});

$('#idEstado').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idEstado3').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idMunicipio').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idMunicipio3').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idLocalidad').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idLocalidad3').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idColonia').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#idColonia3').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#cp').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#cp3').focusout(function(){

var campo = $(this).val();
if (campo.length ===''){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});

$('#calle').focusout(function(){

var campo = $(this).val();
if (campo.length < 3 || campo.length > 200){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#calle3').focusout(function(){

var campo = $(this).val();
if (campo.length < 3 || campo.length > 200){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#numExterno').focusout(function(){

var campo = $(this).val();
if (campo.length < 1 || campo.length > 200){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#numExterno3').focusout(function(){

var campo = $(this).val();
if (campo.length < 1 || campo.length > 200){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#numInterno').focusout(function(){

var campo = $(this).val();
if (campo.length < 1 || campo.length > 200){
    $(this).css({"border-color":"yellow"});
}else{
    $(this).css({"border-color":"green"});
    
}
});
$('#numInterno3').focusout(function(){

var campo = $(this).val();
if (campo.length < 1 || campo.length > 200){
    $(this).css({"border-color":"yellow"});
}else{
    $(this).css({"border-color":"green"});
    
}
});

$('#correo').focusout(function(){

var campo = $(this).val();
if (campo.length < 1 || campo.length > 200){
    $(this).css({"border-color":"yellow"});
}else{
    $(this).css({"border-color":"green"});
    // toastr.info("Su folio se enviará al correo que ha ingresado");
    
}
});
$('#correo2').focusout(function(){

    var campo = $(this).val();
    if (campo.length < 1 || campo.length > 200){
        $(this).css({"border-color":"yellow"});
        
    }else{
        $(this).css({"border-color":"green"});
        // toastr.info("Su folio se enviará al correo que ha ingresado");
        
    }
    });
    
    $('#personasBajoSuGuarda').focusout(function(){

        var campo = $(this).val();
        if (campo.length < 1 || campo.length > 200){
            $(this).css({"border-color":"yellow"});
            
        }else{
            $(this).css({"border-color":"green"});
            // toastr.info("Su folio se enviará al correo que ha ingresado");
            
        }
        });
        $('#motivoEstancia').focusout(function(){

            var campo = $(this).val();
            if (campo.length < 1 || campo.length > 200){
                $(this).css({"border-color":"yellow"});
                
            }else{
                $(this).css({"border-color":"green"});
                // toastr.info("Su folio se enviará al correo que ha ingresado");
                
            }
            });
        

$('#telefonoN').focusout(function(){

var campo = $(this).val();
if (campo.length < 1 || campo.length > 200){
    $(this).css({"border-color":"yellow"});
}else{
    $(this).css({"border-color":"green"});
    
}
});

// $('#fax').focusout(function(){

// var campo = $(this).val();
// if (campo.length < 1 || campo.length > 200){
//     $(this).css({"border-color":"yellow"});
// }else{
//     $(this).css({"border-color":"green"});
    
// }
// });
$('#lugarTrabajo').focusout(function(){

var campo = $(this).val();
if (campo.length < 1 || campo.length > 200){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});

$('#nombres2').focusout(function(){

var campo = $(this).val();
if (campo.length < 1 || campo.length > 200){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});

$('#representanteLegal').focusout(function(){

var campo = $(this).val();
if (campo.length < 1 || campo.length > 200){
    $(this).css({"border-color":"red"});
}else{
    $(this).css({"border-color":"green"});
    
}
});

$('#fechaAltaEmpresa').change(function(){
     var campo = $(this).val();
    if (campo.length < 1 || campo.length > 200){
        $(this).css({"border-color":"red"});
    }else{
        $(this).css({"border-color":"green"});
        
    }
    });
    $('#fecha_nac').change(function(){
        var campo = $(this).val();
       if (campo.length < 1 || campo.length > 200){
           $(this).css({"border-color":"red"});
       }else{
           $(this).css({"border-color":"green"});
           
       }
       });

       $('#fechaNacimiento').change(function(){
        var campo = $(this).val();
       if (campo.length < 1 || campo.length > 200){
           $(this).css({"border-color":"red"});
       }else{
           $(this).css({"border-color":"green"});
           
       }
       });
   


});