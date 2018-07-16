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
			$('#idr').val(json.delito.id); 
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


			$("#idEstadoD").val(json.estado.idEstado).trigger('change.select2');


			 var html3 = '';
			 for (var clave in json.municipios){
				 if (json.municipios.hasOwnProperty(clave)) {
				   html3 += "<option value='"+clave+"'> "+json.municipios[clave]+"</option>";
				 }
			}
			 $('#idMunicipioD').html(html3);

			
			 
			 var html4 = '';
			 for (var clave in json.localidad){
				 if (json.localidad.hasOwnProperty(clave)) {
				   html4 += "<option value='"+clave+"'> "+json.localidad[clave]+"</option>";
				 }
			}
			 $('#idLocalidadD').html(html4);


			 var html5 = '';
			 for (var clave in json.colonia){
				 if (json.colonia.hasOwnProperty(clave)) {
				   html5 += "<option value='"+clave+"'> "+json.colonia[clave]+"</option>";
				 }
			}
			 $('#idColoniaD').html(html5);

			 
			 var html6 = '';
			 for (var clave in json.cp){
				 if (json.cp.hasOwnProperty(clave)) {
				   html6 += "<option value='"+clave+"'> "+json.cp[clave]+"</option>";
				 }
			}
			 $('#cpD').html(html6);


			 $('#calleD').val(json.domicilio.calle).trigger('change.select2');
			 $('#numExternoD').val(json.domicilio.numExterno).trigger('change.select2');
			 $('#numInternoD').val(json.domicilio.numInterno).trigger('change.select2');

			 $('#entreCalleD').val(json.delito.entreCalle);
			 $('#yCalleD').val(json.delito.yCalle);
			 $('#calleTraseraD').val(json.delito.calleTrasera);
			 $('#puntoReferenciaD').val(json.delito.puntoReferencia);

			 $('#idLugarD').val(json.delito.idLugar).trigger('change.select2');
			 $('#idZonaD').val(json.delito.idZona).trigger('change.select2');
			 $('#Cviolencia').val(json.delito.conViolencia).trigger('change.select2');
			//  $('#conViolencia').val(json.delito.conViolencia);
			//  $("#conViolencia").prop(json.delito.conViolencia);
			// console.log(json.delito.conViolencia);
  
			// if (json.delito.conViolencia == '0')
			// $("#conViolenciaD1").prop('checked',true);
			// else
			// $("#conViolenciaD2").prop('checked',true);

		},
	
		error : function(xhr, status) {
		}
	});
	});

	
	//para select multiples en formulario de estado, localidad ,municipico, colonia y cp

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


//para mandar los datos ala base de datos 

$('#guardar').bind('click', function(){

	var datos = {
		'idr' : $('#idr').val(),


		'idDelito2' :$('#idDelito2').select2('val'),
			'idAgrupacionD1' :$("#idAgrupacionD1").select2('val'),
			'idAgrupacionD2' :$('#idAgrupacionD2').select2('val'),
			'formaComisionD2' :$('#formaComisionD2').select2('val'),
			'Cviolencia' :$('#Cviolencia').select2('val'),
			

			'idMunicipioD' :$("#idMunicipioD").select2('val'),
			'idLocalidadD' :$('#idLocalidadD').select2('val'),
			'idColoniaD' :$('#idColoniaD').select2('val'),
			'cpD' :$('#cpD').select2('val'),
			'calleD'	:$('#calleD').val(),
			'numExternoD'	:$('#numExternoD').val(),
			'numInternoD'	:$('#numInternoD').val(),

			'idLugarD'	:$('#idLugarD').select2('val'),
			'idZonaD'	:$('#idZonaD').select2('val'),
		

			'entreCalleD'	:$('#entreCalleD').val(),

			'yCalleD'	:$('#yCalleD').val(),
			'calleTraseraD' :$('#calleTraseraD').val(),
			'puntoReferenciaD' :$('#puntoReferenciaD').val(),

			
		
			'numExternoD'	:$('#numExternoD').val(),
			'numInternoD'	:$('#numInternoD').val(),


			
	}

	console.log(datos);
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
	
		url: route('editar-Delito'),
		data : datos,
		type : 'POST',
		success : function(json) {
			if(json){	
			swal("Hecho", "Registro guardado con exito", "success");
				location.reload();
			}else{
				swal("Hecho", "Error", "success");
			}            
		},
		error : function(xhr, status) {
			swal({
				title: "Error al guardar cambios",
				icon: "error",
			});
		},
		complete : function(xhr, status) {
		}
	});
});
