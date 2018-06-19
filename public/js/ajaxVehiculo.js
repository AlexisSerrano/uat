//var URLactual = window.location;
//var municipios = URLactual.split('/');
url = window.location;



$('.btn-modal').bind('click', function(){
	$ ('#myModal1').modal('show');
	var idr = $(this).val();
	$.ajax({
		//url : "getMedidasAjax/"+idr,
		url: route("getMedidasAjax",idr),
		type : 'GET',
		success : function(json) {
			$("#observaciones1").text(json.observacion);
			$("#fechaInicio1").val(json.fechaInicio);
			$("#fechaFinal1").val(json.fechaFin);
			$("#tipo_medida2").val(json.nombre);
			$('#quienEjecuta1').val(json.idEjecutor).trigger('change.select2');
			$('#victima1').val(json.idPersona).trigger('change.select2');
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
	
	

	

		
