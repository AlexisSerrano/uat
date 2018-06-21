//var URLactual = window.location;
//var municipios = URLactual.split('/');
url = window.location;



	$('.btn-modal').bind('click', function(){
		$ ('#myModal1').modal('show');
		var idr = $(this).val();
		$.ajax({
			//url : "getMedidasAjax/"+idr,
			url: route("getVehiculoAjax",idr),
			type : 'GET',
			success : function(json) {
				console.log(json);
				$('#idTipifDelito1').val(json.Delito).trigger('change.select2');
				$("#placasv").val(json.Placas);
				$('#estadov').val(json.Delito).trigger('change.select2');
				$('#marcav').val(json.Marca).trigger('change.select2');
				var idr2 = $.get(route('get.submarcas', json.Marca), function(response, marca){
					$("#submarcav").empty();
					$("#submarcav").append("<option value=''>Seleccione una submarca</option>");
					for(i=0; i<response.length; i++){
						$("#submarcav").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
					}
				});
				console.log(idr2);
				$('submarcav').val(idr2).trigger('change.select2');

				$('#modelov').val(json.Modelo);
				$('#colorv').val(json.Color).trigger('change.select2');
				$('#nrpvv').val(json.nrpv);
				$('#numseriev').val(json.Serie);
				$('#motorv').val(json.Motor);
				$('#permisov').val(json.Permiso);
				$('#tipousov').val(json.TipoUso).trigger('change.select2');

				$('#procev').val(json.Procedencia).trigger('change.select2');
				$('#asegurav').val(json.Aseguradora).trigger('change.select2');
				$('#senasv').val(json.SParticulares).trigger('change.select2');
				// $("#fechaFinal1").val(json.fechaFin);
				// $("#tipo_medida2").val(json.nombre);
				// $('#quienEjecuta1').val(json.idEjecutor).trigger('change.select2');
				// $('#victima1').val(json.idPersona).trigger('change.select2');
				$('#idr').val(json.id);           
			},
			error : function(xhr, status) {
			}
		});
		});
//para mandar los datos ala base de datos 

	$('#guardar').bind('click', function(){
		var datos = {
			'idr' : $('#idr').val(),
			// 'tipo_medida2'  : $('#tipoProvidencia1').select2('val'),
			'fechaInicio1' : $('#fechaInicio1').val(),
			'fechaFinal1' : $('#fechaFinal1').val(),
			'quienEjecuta1'  : $('#quienEjecuta1').select2('val'),
			'victima1'  : $('#victima1').select2('val'),
			'observaciones1' : $('#observaciones1').val(),
		}
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			//url : "agregar-medidas/editar",
			url: route('agregar-medidas'),
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
	
$("#idclase").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.tipovehiculos', event.target.value), function(response, tipo){
			$("#tipovv").empty();
			$("#tipovv").append("<option value=''>Seleccione un tipo de vehículo</option>");
			for(i=0; i<response.length; i++){
				$("#tipovv").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
	}
});

$("#marcav").change(function(event){
	if(event.target.value!=""){
		$.get(route('get.submarcas', event.target.value), function(response, marca){
			$("#submarcav").empty();
			$("#submarcav").append("<option value=''>Seleccione una submarca</option>");
			for(i=0; i<response.length; i++){
				$("#submarcav").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
			}
		});
	}
});

	

	

		
