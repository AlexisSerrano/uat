//var URLactual = window.location;
//var municipios = URLactual.split('/');
url = window.location;

	
$('.btn-modal-delito').bind('click', function(){
	$ ('#myModal1').modal('show');
	var IdFilaTabla = $(this).val();
	$.ajax({
		//url : "editar/"+IdFilaTabla,
		url: route('getDelitoAjax',IdFilaTabla),
		type : 'GET',
		success : function(json) {
		
			 console.log(json);
			$('#idr').val(json.id); 
			$('#idDelito2').val(json.delito.idDelito).trigger('change.select2');
			var html = '';
			for (var clave in json.agrupacion1){
				if (json.agrupacion1.hasOwnProperty(clave)) {
				  html += "<option value='"+clave+"'> "+json.agrupacion1[clave]+"</option>";
				}
			}
			$('#idAgrupacionD1').html(html);

			var html2 = '';
			for (var clave in json.agrupacion2){
				if (json.agrupacion2.hasOwnProperty(clave)) {
				  html2 += "<option value='"+clave+"'> "+json.agrupacion2[clave]+"</option>";
				}
			}

			$('#idAgrupacionD2').html(html2);
			 $("#formaComisionD2").val(json.delito.FormaComision).trigger('change.select2');

			 console.log(json.delito.FormaComision);

			// $('#formaComision2').val(json.formaComision).trigger('change.select2');
			// $("#fecha2").val(json.fecha);
			// $("#hora2").val(json.hora);
			// console.log(json);
			// $("#observaciones1").val(json.observacion);
			// $("#fechaInicio1").val(json.fechaInicio);
			// $("#fechaFinal1").val(json.fechaFin);
			// $("#tipo_medida2").val(json.nombre);
			// $('#quienEjecuta1').val(json.idEjecutor).trigger('change.select2');
			// $('#victima1').val(json.idPersona).trigger('change.select2');
		
		},
	
		error : function(xhr, status) {
		}
	});
	});

	
	//para select multiples en formulario de estado localidad municipico

	$("#idEstadoD").change(function(event){
		if(event.target.value!=""){
			$.get(route('get.municipio', event.target.value), function(response, estado){
				$("#idMunicipioD").empty();
				$("#idMunicipioD").append("<option value=''>Seleccione un municipio</option>");
				for(i=0; i<response.length; i++){
					$("#idMunicipioD").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
				}
				
			});
		}
	});
	
	$("#idMunicipioD").change(function(event){
		if(event.target.value!=""){
			$.get(route('get.localidad', event.target.value), function(response, municipio){
				$("#idLocalidadD").empty();
				$("#idLocalidadD").append("<option value=''>Seleccione una localidad</option>");
				for(i=0; i<response.length; i++){
					$("#idLocalidadD").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
				}
			});
			$.get(route('get.colonia2', event.target.value), function(response, municipio){
				$("#idColoniaD").empty();
				$("#idColoniaD").append("<option value=''>Seleccione una colonia</option>");
				for(i=0; i<response.length; i++){
					$("#idColoniaD").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
				}
			});
			$.get(route('get.codigo', event.target.value), function(response, municipio){
				$("#cpD").empty();
				$("#cpD").append("<option value=''>Seleccione un código postal</option>");
				for(i=0; i<response.length; i++){
					$("#cpD").append("<option value='"+response[i].id+"'> "+response[i].codigoPostal+"</option>");
				}
				
			});
		}
	});

	
//para select de agrpupacion
	$("#idDelito2").change(function(event){
		if(event.target.value!=""){
			$.get(route('get.agregacion1',event.target.value), function(response, delito){
				$("#idAgrupacionD1").empty();
				console.log(response);
				$("#idAgrupacionD1").append("<option value=''>Seleccione una desagregación</option>");
				for(i=0; i<response.length; i++){
					$("#idAgrupacionD1").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
				}
		});
	}
	});
	
	$("#idAgrupacionD1").change(function(event){
		if(event.target.value!=""){
			$.get(route('get.agregacion2',event.target.value), function(response, agrupacion1){
				$("#idAgrupacionD2").empty();
				console.log(response);
				$("#idAgrupacionD2").append("<option value=''>Seleccione una desagregación</option>");
				for(i=0; i<response.length; i++){
					$("#idAgrupacionD2").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
				}
			});
		}
	});


