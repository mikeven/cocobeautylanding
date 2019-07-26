// Actividades
/*
 * fn-actividad.js
 *
 */
/* --------------------------------------------------------- */	
/* --------------------------------------------------------- */


jQuery(function($) {'use strict',
	$(".lnk_confirm").on( "click", function(){
    	
    	var actividad = $(this).attr("data-nactividad");
    	var fecha = $(this).attr("data-fecha");
    	var hora = $( "#selhr_act option:selected" ).text();

    	$("#frm_nactividad").html( actividad );
    	$("#frm_fecha_act").html( fecha );
    	$("#frm_hora_act").html( hora );
	});
}); 