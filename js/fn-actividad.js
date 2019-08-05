// Función sobre Actividades
/*
 * fn-actividad.js
 *
 */
/* --------------------------------------------------------- */	
/* --------------------------------------------------------- */
(function() {
	
	'use strict';

	// Validación de formulario de reservación
	$("#frm-reservacion").validate({
        highlight: function( label ) {
            $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function( label ) {
            $(label).closest('.form-group').removeClass('has-error');
            label.remove();
        },
        onkeyup: false,
        errorPlacement: function( error, element ) {
            var placement = element.closest('.input-group');
            if (!placement.get(0)) {
                placement = element;
            }
            if (error.text() !== '') {
                placement.after(error);
            }
        },
        submitHandler: function(form) {
            reservar();
        }
    });
	/* --------------------------------------------------------- */
	function reiniciarFormReservacion(){
        // Reinicio de formulario de después de registrar una reservación

		$("#frm-reservacion")[0].reset();
		$("#campos_reservacion").show();
		$(".modal-title").show("slow");
	    $("#respuesta_reservacion").html( "" );
	    $("#contenido_reservacion").hide();

	}
	/* --------------------------------------------------------- */
    $(".lnk_confirm").on( "click", function(){
        // Evento para mostrar el formulario de reservación después de elegido un horario 
    	reiniciarFormReservacion();
    	
    	var selector_hora = $(this).attr("data-shr");
    	var actividad = $(this).attr("data-nactividad");
    	var fecha = $(this).attr("data-fecha");
    	var hora = $( "#" + selector_hora + " option:selected" ).text();
    	var idhora = $( "#" + selector_hora ).val();

    	$("#frm_nactividad").html( actividad );
    	$("#frm_fecha_act").html( fecha );
    	$("#frm_hora_act").html( hora );
    	$("#id-horario").val( idhora );
        $("#fe_hr").val( fecha + " " + hora );
        $("#nactividad").val( actividad );
	});
    /* --------------------------------------------------------- */
    $(".btn-cancelar-rsv").on( "click", function(){
        // Evento para cancelar una reservación 
        cancelar( $(this).attr( "data-token" ) );
    });
	/* --------------------------------------------------------- */
	$(".horas_act").on( "change", function(){
        // Selección de horario de un actividad
		var link = $(this).attr("data-lnk");
		if( $(this).val() != -1 ) 
			$( "#" + link ).fadeIn();
		else $( "#" + link ).fadeOut();
	});

}).apply( this, [ jQuery ]);

/* --------------------------------------------------------- */
function respuestaReservacion( mensaje, e ){
    // Muestra y esconde elementos para dar respuesta a un registro de reservación

	$("#campos_reservacion").hide();
	$(".modal-title").fadeOut("slow");
    if( e == 1 ) $("#respuesta_reservacion").css( "color", "#000" );
    if( e == -1 ) $("#respuesta_reservacion").css( "color", "red" );
    $("#respuesta_reservacion").html( mensaje );
    $("#contenido_reservacion").fadeIn();
}
/* --------------------------------------------------------- */
function reservar(){
    //Invoca al servidor para registrar una reservación
    var form = $('#frm-reservacion').serialize();
    var espera = "<img src='img/loading.gif' width='60'>";
    
    $.ajax({
        type:"POST",
        url:"database/data-reservacion.php",
        data:{ reservar: form },
        beforeSend: function() {
            $("#response-reg").html( espera );
        },
        success: function( response ){
            console.log( response );
            res = jQuery.parseJSON( response );
            respuestaReservacion( res.mje, res.exito );
        }
    });
}
/* --------------------------------------------------------- */
function cancelar( token ){
    //Invoca al servidor para cancelar una reservación
    var espera = "<img src='img/loading.gif' width='60'>";
    
    $.ajax({
        type:"POST",
        url:"database/data-reservacion.php",
        data:{ cancelar_r: token },
        beforeSend: function() {
            $("#response-reg").html( espera );
        },
        success: function( response ){
            console.log( response );
            res = jQuery.parseJSON( response );
            $("#respuesta_reservacion").html( res.mje );
            $(".btn-cancelar-rsv").fadeOut();
        }
    });
}
/* --------------------------------------------------------- */