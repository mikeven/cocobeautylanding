<?php
	/* --------------------------------------------------------- */
	/* CBC - Datos sobre Actividades / Eventos */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	function obtenerActividades( $dbh ){
		//Devuelve todos los registros de actividades
		$q = "select id, nombre, descripcion, imagen from actividad";
		
		$data = mysqli_query( $dbh, $q );
		return obtenerListaRegistros( $data );
	}
	/* --------------------------------------------------------- */
	function obtenerActividadPorId( $dbh, $ida ){
		//Devuelve el registro de una actividad dado su id
		$q = "select id, nombre, descripcion, imagen from actividad where id = $ida";
		
		$data = mysqli_query( $dbh, $q );
		$data ? $registro = mysqli_fetch_array( $data ) : $registro = NULL;
		return $registro;
	}
	/* --------------------------------------------------------- */
	function obtenerFechasActividad( $dbh, $ida ){
		// Devuelve las fechas en que está pautada una actividad
		
		mysqli_query( $dbh, "SET lc_time_names = 'es_ES';" );

		$q = "select distinct date_format(fecha,'%W %d de %M') as fecha, 
		 date_format(fecha,'%Y/%m/%d') as date from horario   
		 where ACTIVIDAD_id = $ida order by date ASC";
		
		$data = mysqli_query( $dbh, $q );
		return obtenerListaRegistros( $data );
	}
	/* --------------------------------------------------------- */
	function obtenerHorariosActividadPorFecha( $dbh, $ida, $fecha ){
		//Devuelve los registros de horas de una actividad por fecha dado su id
		$q = "select id, date_format(fecha,'%h:%i %p') as hora, cupo 
		from horario where '$fecha' like date_format(fecha,'%Y/%m/%d') 
		and ACTIVIDAD_id = $ida";
		
		$data = mysqli_query( $dbh, $q );
		return obtenerListaRegistros( $data );
	}
	/* --------------------------------------------------------- */
	if( isset( $_POST["nactividad"] ) ){ 
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );

		parse_str( $_POST["nactividad"], $actividad );
		$actividad = escaparCampos( $dbh, $actividad );
		
		$rsp = 1;//agregarActividad( $dbh, $actividad );
		if( $rsp != 0 ){
			$res["exito"] = 1;
			$res["mje"] = "Actividad registrada con éxito";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al registrar actividad";
		}

		echo json_encode( $res );
	}
	
?>