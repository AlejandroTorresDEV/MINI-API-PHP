
function realizaProceso(){

	$.ajax({

		type: "POST",
    	dataType: "json",
    	url: "get_alumnos.php",
		})
 		.done(function(respuesta) {
     	 	console.log(respuesta);
     	 	muestraDatos(respuesta);
 		})
 		.fail(function( jqXHR, textStatus, errorThrown ) {	
		});
    }

function muestraDatos(json){

		var $tbody = $("#tabla_usuarios tbody");

		for (var i = 0; i < json.data.length; i++) {
			$tbody.append("<tr>");
			$tbody.append("<td>"+ json.data[i].nombre + "</td>");
			$tbody.append("<td>"+ json.data[i].dni + "</td>");
			$tbody.append("<tr>");
		}
	}

