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

//setInterval(getRandValue, 3000);