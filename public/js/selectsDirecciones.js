jQuery.ajaxSetup({async:false});
$("#idEstadoOrigen").change(function(event){ 
	//$.get(route('get.municipio', event.target.value), function(response, estado){
	$.get(route('get.municipio', event.target.value), function(response, estado){
		$("#idMunicipioOrigen").empty();
		$("#idMunicipioOrigen").append("<option value=''>Seleccione un municipio</option>");
		for(i=0; i<response.length; i++){
			$("#idMunicipioOrigen").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
		}
	});
});

$("#idEstado").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.municipio', event.target.value), function(response, estado){
			$("#idMunicipio").empty();
			$("#idMunicipio").append("<option value=''>Seleccione un municipio</option>");
			for(i=0; i<response.length; i++){
				$("#idMunicipio").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
			$("#idMunicipio3").empty();
			$("#idMunicipio3").append("<option value=''>Seleccione un municipio</option>");
			for(i=0; i<response.length; i++){
				$("#idMunicipio3").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$('#idEstado3').val($('#idEstado').val()).trigger('change.select2');
	}
});

$("#idMunicipio").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.localidad', event.target.value), function(response, municipio){
			$("#idLocalidad").empty();
			$("#idLocalidad").append("<option value=''>Seleccione una localidad</option>");
			for(i=0; i<response.length; i++){
				$("#idLocalidad").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
			$("#idLocalidad3").empty();
			$("#idLocalidad3").append("<option value=''>Seleccione una localidad</option>");
			for(i=0; i<response.length; i++){
				$("#idLocalidad3").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$.get(route('get.colonia2', event.target.value), function(response, municipio){
			$("#idColonia").empty();
			$("#idColonia").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
			$("#idColonia3").empty();
			$("#idColonia3").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia3").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$.get(route('get.codigo', event.target.value), function(response, municipio){
			$("#cp").empty();
			$("#cp").append("<option value=''>Seleccione un código postal</option>");
			for(i=0; i<response.length; i++){
				$("#cp").append("<option value='"+response[i].id+"'> "+response[i].codigoPostal+"</option>");
			}
			$("#cp3").empty();
			$("#cp3").append("<option value=''>Seleccione un código postal</option>");
			for(i=0; i<response.length; i++){
				$("#cp3").append("<option value='"+response[i].id+"'> "+response[i].codigoPostal+"</option>");
			}
		});
		$('#idMunicipio3').val($('#idMunicipio').val()).trigger('change.select2');
	}
});

// $("#idMunicipio").change(function(event){
// 	municipio = $(this).val();
// 	if(municipio!=""){
// 		$.get(route('get.listas', event.target.value), function(response, municipio){
// 			html = "<option value=''>Seleccione una localidad</option>";
// 			html2 = "<option value=''>Seleccione una colonia</option>";
// 			html3 = "<option value=''>Seleccione un código postal</option>";
// 			for(i=0; i<response[0].length; i++){
// 				html += "<option value='"+response[0][i].id+"'> "+response[0][i].nombre+"</option>";
// 			}
// 			for(i=0; i<response[1].length; i++){
// 				html2 += "<option value='"+response[0][i].id+"'> "+response[0][i].nombre+"</option>";
// 			}
// 			for(i=0; i<response[2].length; i++){
// 				html3 += "<option value='"+response[0][i].id+"'> "+response[0][i].nombre+"</option>";
// 			}
// 			$("#idLocalidad").html(html);
// 			$("#idLocalidad3").html(html);
// 			$("#idColonia").html(html2);
// 			$("#idColonia3").html(html2);
// 			$("#cp").html(html3);
// 			$("#cp3").html(html3);
// 		});
// 		$('#idMunicipio3').val($('#idMunicipio').val()).trigger('change.select2');
// 	}
// });

$("#idLocalidad").change(function(event){
	if(event.target.value!=""){
		$('#idLocalidad3').val($('#idLocalidad').val()).trigger('change.select2');
	}
});

// $("#cp").change(function(event){
// 	if(event.target.value!=""){
// 		$.get("../colonias/"+$('#cp option:selected').html()+"", function(response, cp){
// 			$("#idColonia").empty();
// 			$("#idColonia").append("<option value=''>Seleccione una colonia</option>");
// 			for(i=0; i<response.length; i++){
// 				$("#idColonia").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
// 			}
// 			$("#idColonia3").empty();
// 			$("#idColonia3").append("<option value=''>Seleccione una colonia</option>");
// 			for(i=0; i<response.length; i++){
// 				$("#idColonia3").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
// 			}
// 		});
// 		$('#cp3').val($('#cp').val()).trigger('change.select2');
// 		$('#idColonia3').val($('#idColonia').val()).trigger('change.select2');
// 	}
// });

$("#idColonia").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.codigo2', event.target.value), function(response, colonia){
			$("#cp").empty();
			$("#cp").append("<option value='"+response[0].id+"'> "+response[0].codigoPostal+"</option>");
			$("#cp3").empty();
			$("#cp3").append("<option value='"+response[0].id+"'> "+response[0].codigoPostal+"</option>");
		});
		$('#idColonia3').val($('#idColonia').val()).trigger('change.select2');
	}
});

$("#calle").keyup(function() {
	$('#calle3').val($('#calle').val().toUpperCase());
});
$("#numExterno").keyup(function() {
	$('#numExterno3').val($('#numExterno').val().toUpperCase());
});
$("#numInterno").keyup(function() {
	$('#numInterno3').val($('#numInterno').val().toUpperCase());
});


$("#idEstado2").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.municipio', event.target.value), function(response, estado){
			$("#idMunicipio2").empty();
			$("#idMunicipio2").append("<option value=''>Seleccione un municipio</option>");
			for(i=0; i<response.length; i++){
				$("#idMunicipio2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
	}
});

$("#idMunicipio2").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.localidad', event.target.value), function(response, municipio){
			$("#idLocalidad2").empty();
			$("#idLocalidad2").append("<option value=''>Seleccione una localidad</option>");
			for(i=0; i<response.length; i++){
				$("#idLocalidad2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$.get(route('get.colonia2', event.target.value), function(response, municipio){
			$("#idColonia2").empty();
			$("#idColonia2").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$.get(route('get.codigo', event.target.value), function(response, municipio){
			$("#cp2").empty();
			$("#cp2").append("<option value=''>Seleccione un código postal</option>");
			for(i=0; i<response.length; i++){
				$("#cp2").append("<option value='"+response[i].id+"'> "+response[i].codigoPostal+"</option>");
			}
		});
	}
});

// $("#cp2").change(function(event){
// 	if(event.target.value!=""){
// 		$.get("../colonias/"+$('#cp2 option:selected').html()+"", function(response, cp){
// 			$("#idColonia2").empty();
// 			$("#idColonia2").append("<option value=''>Seleccione una colonia</option>");
// 			for(i=0; i<response.length; i++){
// 				$("#idColonia2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
// 			}
// 		});
// 	}
// });

$("#idColonia2").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.codigo2', event.target.value), function(response, colonia){
			$("#cp2").empty();
			$("#cp2").append("<option value='"+response[0].id+"'> "+response[0].codigoPostal+"</option>");
		});
	}
});

$("#idEstado3").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.municipio', event.target.value), function(response, estado){
			$("#idMunicipio3").empty();
			$("#idMunicipio3").append("<option value=''>Seleccione un municipio</option>");
			for(i=0; i<response.length; i++){
				$("#idMunicipio3").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
	}
});

$("#idMunicipio3").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.localidad', event.target.value), function(response, municipio){
			$("#idLocalidad3").empty();
			$("#idLocalidad3").append("<option value=''>Seleccione una localidad</option>");
			for(i=0; i<response.length; i++){
				$("#idLocalidad3").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$.get(route('get.colonia2', event.target.value), function(response, municipio){
			$("#idColonia3").empty();
			$("#idColonia3").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia3").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$.get(route('get.codigo', event.target.value), function(response, municipio){
			$("#cp3").empty();
			$("#cp3").append("<option value=''>Seleccione un código postal</option>");
			for(i=0; i<response.length; i++){
				$("#cp3").append("<option value='"+response[i].id+"'> "+response[i].codigoPostal+"</option>");
			}
		});
	}
});

// $("#cp3").change(function(event){
// 	if(event.target.value!=""){
// 		$.get("../colonias/"+$('#cp3 option:selected').html()+"", function(response, cp){
// 			$("#idColonia3").empty();
// 			$("#idColonia3").append("<option value=''>Seleccione una colonia</option>");
// 			for(i=0; i<response.length; i++){
// 				$("#idColonia3").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
// 			}
// 		});
// 	}
// });

$("#idColonia3").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.codigo2', event.target.value), function(response, colonia){
			$("#cp3").empty();
			$("#cp3").append("<option value='"+response[0].id+"'> "+response[0].codigoPostal+"</option>");
		});
	}
});


$("#idAbogado").change(function(event){
	if(event.target.value!=""){
		var idCarpeta = $("input[type=hidden][name=idCarpeta]").val();
		$.get(route('getinvolucrados',event.target.value), function(response, idCarpeta){
			$("#idInvolucrado").empty();
			$("#idInvolucrado").append("<option value=''>Seleccione un involucrado</option>");
			console.log(event.target.value);
			for(i=0; i<response.length; i++){
				$("#idInvolucrado").append("<option value='"+response[i].id+"'> "+response[i].nombres+"</option>");
			}
		});
	}
});

$("#idEstadoC").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.municipio', event.target.value), function(response, estado){
			$("#idMunicipioC").empty();
			$("#idMunicipioC").append("<option value=''>Seleccione un municipio</option>");
			for(i=0; i<response.length; i++){
				$("#idMunicipioC").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
	}
});

$("#idMunicipioC").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.localidad', event.target.value), function(response, municipio){
			$("#idLocalidadC").empty();
			$("#idLocalidadC").append("<option value=''>Seleccione una localidad</option>");
			for(i=0; i<response.length; i++){
				$("#idLocalidadC").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$.get(route('get.colonia2', event.target.value), function(response, municipio){
			$("#idColoniaC").empty();
			$("#idColoniaC").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColoniaC").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$.get(route('get.codigo', event.target.value), function(response, municipio){
			$("#cpC").empty();
			$("#cpC").append("<option value=''>Seleccione un código postal</option>");
			for(i=0; i<response.length; i++){
				$("#cpC").append("<option value='"+response[i].id+"'> "+response[i].codigoPostal+"</option>");
			}
		});
	}
});


$("#idColoniaC").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.codigo2', event.target.value), function(response, colonia){
			$("#cpC").empty();
			$("#cpC").append("<option value='"+response[0].id+"'> "+response[0].codigoPostal+"</option>");
		});
	}
});

$("#idDelito").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.agregacion1',event.target.value), function(response, delito){
			$("#idAgrupacion1").empty();
			console.log(response);
			$("#idAgrupacion1").append("<option value=''>Seleccione una desagregación</option>");
			for(i=0; i<response.length; i++){
				//alert(response.length);
				if(response.length==1){
					//alert();
					$("#idAgrupacion1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
					$("#idAgrupacion1").val(response[i].id).trigger('change');
				}else{
					$("#idAgrupacion1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
				}
			}
	});
}
});

$("#idAgrupacion1").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.agregacion2',event.target.value), function(response, agrupacion1){
			$("#idAgrupacion2").empty();
			console.log(response);
			$("#idAgrupacion2").append("<option value=''>Seleccione una desagregación</option>");
			for(i=0; i<response.length; i++){
				if(response.length==1){
					$("#idAgrupacion2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
					$("#idAgrupacion2").val(response[i].id).trigger('change');
				}else{
					$("#idAgrupacion2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
				}
			}
		});
	}
});

//->

$("#idEstado1").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.municipio', event.target.value), function(response, estado){
			$("#idMunicipio1").empty();
			$("#idMunicipio1").append("<option value=''>Seleccione un municipio</option>");
			for(i=0; i<response.length; i++){
				$("#idMunicipio1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});

		
	}
});

$("#idMunicipio1").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.localidad', event.target.value), function(response, municipio){
			$("#idLocalidad1").empty();
			$("#idLocalidad1").append("<option value=''>Seleccione una localidad</option>");
			for(i=0; i<response.length; i++){
				$("#idLocalidad1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		
		$.get(route('get.codigo', event.target.value), function(response, municipio){
			$("#cp1").empty();
			$("#cp1").append("<option value=''>Seleccione un código postal</option>");
			for(i=0; i<response.length; i++){
				$("#cp1").append("<option value='"+response[i].codigoPostal+"'> "+response[i].codigoPostal+"</option>");
			}
		});

	}
});

$("#cp1").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.colonia',$('#cp1 option:selected').html()), function(response, cp){
			$("#idColonia1").empty();
			$("#idColonia1").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});

		$.get(route('get.colonia',$('#cp1 option:selected').html()), function(response, cp){
			$("#idColonia1").empty();
			$("#idColonia1").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
	
	}
});

//selects persona fisica 

$("#idEstado2").change(function(event){
	if(event.target.value!=""){
		
		$.get(route('get.municipio', event.target.value), function(response, estado){
			$("#idMunicipio2").empty();
			$("#idMunicipio2").append("<option value=''>Seleccione un municipio</option>");
			for(i=0; i<response.length; i++){
				$("#idMunicipio2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		
	}
});

$("#idMunicipio2").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.localidad', event.target.value), function(response, municipio){
			$("#idLocalidad2").empty();
			$("#idLocalidad2").append("<option value=''>Seleccione una localidad</option>");
			for(i=0; i<response.length; i++){
				$("#idLocalidad2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$.get(route('get.codigo', event.target.value), function(response, municipio){
			$("#cp2").empty();
			$("#cp2").append("<option value=''>Seleccione un código postal</option>");
			for(i=0; i<response.length; i++){
				$("#cp2").append("<option value='"+response[i].codigoPostal+"'> "+response[i].codigoPostal+"</option>");
			}
		});

	}
});

$("#cp2").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.colonia',$('#cp2 option:selected').html()), function(response, cp){
			$("#idColonia2").empty();
			$("#idColonia2").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});

		$.get(route('get.colonia',$('#cp2 option:selected').html()), function(response, cp){
			$("#idColonia2").empty();
			$("#idColonia2").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
	
	}
});


$("#selectUnidad").change(function(event){ 
	//alert('entra aqui');
	//$.get(route('get.municipio', event.target.value), function(response, estado){
	$.get(route('get.fiscales', event.target.value), function(response, estado){
		$("#selectFiscal").empty();
		$("#selectFiscal").append("<option value=''>Seleccione un fiscal</option>");
		console.log(response);
		for(i=0; i<response.length; i++){
			$("#selectFiscal").append("<option value='"+response[i].id+"'> "+response[i].nombreC+"</option>");
		}
	});
});

// $("#idDelito").change(function(event){
// 	if(event.target.value!=""){
// 		$.get("../agrupaciones1/"+event.target.value+"", function(response, delito){
// 			$("#idAgrupacion1").empty();
// 			//console.log(response);
// 			$("#idAgrupacion1").append("<option value=''>Seleccione una desagregación</option>");
// 			for(i=0; i<response.length; i++){
// 				$("#idAgrupacion1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
// 			}
// 	});
// }
// });

// $("#idAgrupacion1").change(function(event){
// 	if(event.target.value!=""){
// 		$.get("../agrupaciones2/"+event.target.value+"", function(response, agrupacion1){
// 			$("#idAgrupacion2").empty();
// 			console.log(response);
// 			$("#idAgrupacion2").append("<option value=''>Seleccione una desagregación</option>");
// 			for(i=0; i<response.length; i++){
// 				$("#idAgrupacion2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
// 			}
// 	});
// }
// });
// $('form').sisyphus({
// 	excludeFields: $( 'input[name=_token]' )
// });
