//var URLactual = window.location;
//var municipios = URLactual.split('/');
url = window.location;

function redireccionarPagina() {
	window.location = "/urgentes";
  }
function miajax(id,inputValue){
	var parametros = {
		"preregistro" : id,
		"tipo" : 1,
		"justificacion": inputValue
	};
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type: "POST",
		url: "../../estado",
		data:  parametros,
		success: function(data) {
			if(data){
				swal("Hecho", "Registro puesto en cola con exito", "success");
				setTimeout("redireccionarPagina()", 3000);
			}			
		}
	});
}
$(".btnEnUrgente").click(function(){
	id = $(this).attr("id");
	swal({
		title: "Puesto en urgente",
		text: "¿Por qué razon se pondra en urgente?",
		type: "input",
		showCancelButton: true,
		closeOnConfirm: false,
		inputPlaceholder: "Justificación"
	  }, function (inputValue) {
		if (inputValue === false) return false;
		if (inputValue === "") {
		  swal.showInputError("Introduzca una justificación");
		
		  return false
		}
		miajax(id,inputValue);
	  });
});
$( "#filmunicipio" ).change(function() {
  	id = this.value;
  	window.location.replace('/showbymunicipio/'+id);
});

$( "#filfiscal" ).change(function() {
	id = this.value;
	window.location.replace('/buscarmunicipio/'+id);
});
$( ".rownarraciones" ).click(function() {
	area = $('#areaNarracion');
	div = $('#divText');
	id = $(this).attr("id");
	c = $(this).attr("class");
	$.ajax({
		type: "GET",
		url: "../getnarracion/"+id,
		dataType: "json",
		success: function(data) {
			if(c=='rownarraciones ultimo'){
				div.hide();
				area.text(data['narracion']['narracion']);
				area.show();
			}
			else{
				area.hide();
				div.text(data['narracion']['narracion']);
				div.show();
			}
		}
	});
});
if(url!="http://uat.oo/"){
	// $( document ).idleTimer( 5000 );
	// $( document ).on( "idle.idleTimer", function(event, elem, obj){
	// 	swal({
	// 		title:'Sesión inactiva',
	// 		text:"¿Desea continuar con su sesión?",
	// 		timer: 3000,
	// 	}, function(isConfirm){
	// 		if(!isConfirm){
	// 			window.location.href='http://uat.oo/cerrar';
	// 		}
	// 	});
	// });
}
else{
	$("#cerrarsesion").hide();
}

function getRandValue(){
	value = $('.notespera');

	$.ajax({
		type: "GET",
		url: "../notificaciones",
		dataType: "json",
		success: function(data) {
			value.text(data['espera']);
			//console.log(data['espera']);
		}
	});
}



$('.btn-modal').bind('click', function(){
	$ ('#myModal1').modal('show');
	var idr = $(this).val();
	console.log(idr);
	$('#idr').val(idr);
	$('#tipo_medida').val($('tr#'+idr+' td.providencia').text());
	$('#fecha_inicio').val($('tr#'+idr+' td.fechainicio').text());
	$('#fecha_final').val($('tr#'+idr+' td.fechafin').text());
	$('#ejecuta').val($('tr#'+idr+' td.ejecutor').text());
	$('#persona').val($('tr#'+idr+' td.persona').text());
	$('#observaciones').val($('tr#'+idr+' td.observacion').text());
    
	});
	

	$('#guardar').bind('click', function(){
		var datos = {
			'idr' : $('#idr').val(),
			'observaciones' : $('#observaciones').val(),
			'tipo_medida'  : $('#tipo_medida').val(),
		}
		//console.log(datos);
		
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url : "agregar-medidas/editar",

			data : datos,

			type : 'POST',

			success : function(json) {
				if(json){
						
				swal("Hecho", "Registro guardado con exito", "success");
				location.reload();
				}else{
					swal("Hecho", "Error", "success");
				}

				console.log('Se agrego un vehiculo');

				console.log(json); 

				console.log('actualizar');

				//$('#form_registro).find('input, textarea, button, select').attr('disabled','disabled');

				//$('#guardar_cambios').attr('disabled','disabled');                        
			},

			error : function(xhr, status) {

				console.log('Disculpe, existió un problema');

				console.log(xhr);

				swal({

					title: "Error al guardar cambios",

					icon: "error",

				});

			},

			complete : function(xhr, status) {

				console.log('Petición realizada');

			}

		});

		
		});
		