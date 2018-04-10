

$("#idEstado1").focusout(function(event){
	if(event.target.value!=""){
		$.get("../municipios/"+event.target.value+"", function(response, estado){
			$("#idMunicipio1").empty();
			$("#idMunicipio1").append("<option value=''>Seleccione un municipio</option>");
			for(i=0; i<response.length; i++){
				$("#idMunicipio1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});

		
	}
});

$("#idMunicipio1").focusout(function(event){
	if(event.target.value!=""){
		$.get("../localidades/"+event.target.value+"", function(response, municipio){
			$("#idLocalidad1").empty();
			$("#idLocalidad1").append("<option value=''>Seleccione una localidad</option>");
			for(i=0; i<response.length; i++){
				$("#idLocalidad1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		
		$.get("../codigos/"+event.target.value+"", function(response, municipio){
			$("#cp1").empty();
			$("#cp1").append("<option value=''>Seleccione un código postal</option>");
			for(i=0; i<response.length; i++){
				$("#cp1").append("<option value='"+response[i].codigoPostal+"'> "+response[i].codigoPostal+"</option>");
			}
		});

	}
});

$("#cp1").focusout(function(event){
	if(event.target.value!=""){
		$.get("../colonias/"+$('#cp1 option:selected').html()+"", function(response, cp){
			$("#idColonia1").empty();
			$("#idColonia1").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});

		$.get("../colonias/"+$('#cp1 option:selected').html()+"", function(response, cp){
			$("#idColonia1").empty();
			$("#idColonia1").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
	
	}
});

//selects persona fisica 

$("#idEstado2").focusout(function(event){
	if(event.target.value!=""){
		
		$.get("../municipios/"+event.target.value+"", function(response, estado){
			$("#idMunicipio2").empty();
			$("#idMunicipio2").append("<option value=''>Seleccione un municipio</option>");
			for(i=0; i<response.length; i++){
				$("#idMunicipio2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		
	}
});

$("#idMunicipio2").focusout(function(event){
	if(event.target.value!=""){
		$.get("../localidades/"+event.target.value+"", function(response, municipio){
			$("#idLocalidad2").empty();
			$("#idLocalidad2").append("<option value=''>Seleccione una localidad</option>");
			for(i=0; i<response.length; i++){
				$("#idLocalidad2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		$.get("../codigos/"+event.target.value+"", function(response, municipio){
			$("#cp2").empty();
			$("#cp2").append("<option value=''>Seleccione un código postal</option>");
			for(i=0; i<response.length; i++){
				$("#cp2").append("<option value='"+response[i].codigoPostal+"'> "+response[i].codigoPostal+"</option>");
			}
		});

	}
});

$("#cp2").focusout(function(event){
	if(event.target.value!=""){
		$.get("../colonias/"+$('#cp2 option:selected').html()+"", function(response, cp){
			$("#idColonia2").empty();
			$("#idColonia2").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});

		$.get("../colonias/"+$('#cp2 option:selected').html()+"", function(response, cp){
			$("#idColonia2").empty();
			$("#idColonia2").append("<option value=''>Seleccione una colonia</option>");
			for(i=0; i<response.length; i++){
				$("#idColonia2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
	
	}
});
