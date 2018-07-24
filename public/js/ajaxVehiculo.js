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
				$('#idTipifDelito1').val(json.vehiculo.Delito).trigger('change.select2');
				$("#placasv").val(json.vehiculo.Placas);
				$('#estadov').val(json.vehiculo.Estado).trigger('change.select2');
				$('#marcav').val(json.vehiculo.Marca).trigger('change.select2');
				var html = '';
				for (var clave in json.submarcas){
					if (json.submarcas.hasOwnProperty(clave)) {
					  html += "<option value='"+clave+"'> "+json.submarcas[clave]+"</option>";
					}
				}
				 $("#submarcav").html(html);
				 $('#submarcav').val(json.vehiculo.Submarca).trigger('change.select2');

				$('#modelov').val(json.vehiculo.Modelo);
				$('#colorv').val(json.vehiculo.Color).trigger('change.select2');
				$('#nrpvv').val(json.vehiculo.nrpv);
				$('#numseriev').val(json.vehiculo.Serie);
				$('#motorv').val(json.vehiculo.Motor);
				$('#permisov').val(json.vehiculo.Permiso);
				$('#idclase').val(json.vehiculo.ClaseVehiculo).trigger('change.select2');
				var html2 = '';
				for (var clave in json.tipovehiculo){
					if (json.tipovehiculo.hasOwnProperty(clave)) {
					  html2 += "<option value='"+clave+"'> "+json.tipovehiculo[clave]+"</option>";
					}
				}
				$('#tipovv').html(html2);
				$('#tipovv').val(json.vehiculo.TipoVehiculo).trigger('change.select2');
				$('#tipousov').val(json.vehiculo.TipoUso).trigger('change.select2');
				$('#procev').val(json.vehiculo.Procedencia).trigger('change.select2');
				$('#asegurav').val(json.vehiculo.Aseguradora).trigger('change.select2');
				$('#senasv').val(json.vehiculo.SParticulares).trigger('change.select2');
				// $("#fechaFinal1").val(json.fechaFin);
				// $("#tipo_medida2").val(json.nombre);
				// $('#quienEjecuta1').val(json.idEjecutor).trigger('change.select2');
				// $('#victima1').val(json.idPersona).trigger('change.select2');
				$('#idr').val(idr);           
			},
			error : function(xhr, status) {
			}
		});
		});
//para mandar los datos ala base de datos 

	$('#guardar').bind('click', function(){
		var datos = {
			'idr' : $('#idr').val(),
			// // 'tipo_medida2'  : $('#tipoProvidencia1').select2('val'),
			// 'fechaInicio1' : $('#fechaInicio1').val(),
			// 'fechaFinal1' : $('#fechaFinal1').val(),
			// 'quienEjecuta1'  : $('#quienEjecuta1').select2('val'),
			// 'victima1'  : $('#victima1').select2('val'),
			// 'observaciones1' : $('#observaciones1').val(),

			'idTipifDelito1' :$('#idTipifDelito1').select2('val'),
				'placasv' :$("#placasv").val(),
				'estadov' :$('#estadov').select2('val'),
				'submarcav' :$('#submarcav').select2('val'),

				'modelov'	:$('#modelov').val(),
				'colorv'	:$('#colorv').select2('val'),
				'nrpvv' :$('#nrpvv').val(),
				'numseriev'	:$('#numseriev').val(),
				'motorv'	:$('#motorv').val(),
				'permisov' :$('#permisov').val(),

			'tipovv'	:$('#tipovv').select2('val'),
			'tipousov'	:$('#tipousov').select2('val' ),

			'procev'	:$('#procev').select2('val' ),
			'asegurav'	:$('#asegurav').select2('val' ),
			'senasv'	:$('#senasv').val(),
		}
		console.log(datos);
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			//url : "agregar-medidas/editar",
			url: route('agregar-vehiculo'),
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

	

	

		
