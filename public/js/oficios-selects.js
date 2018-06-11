$("#unidadOficios").change(function(event){
	if(event.target.value!=""){
		
		$.get(route('get.fiscal', event.target.value), function(response, fiscal){
			$("#fiscalC").empty();
			$("#fiscalC").append("<option value=''>Seleccione un fiscal</option>");
			for(i=0; i<response.length; i++){
				$("#fiscalC").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		
		
	}
});

$("#unidadOficios").change(function(event){
	if(event.target.value!=""){
		
		$.get(route('get.fiscal', event.target.value), function(response, fiscal){
			$("#fiscalDistrito").empty();
			$("#fiscalDistrito").append("<option value=''>Seleccione un fiscal</option>");
			for(i=0; i<response.length; i++){
				$("#fiscalDistrito").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
		
			
	}
});