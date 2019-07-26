<?php
	/* --------------------------------------------------------- */
	/* CBC - Datos sobre Actividades / Eventos */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	//define( "RUTA_SUSTENTOS", "../upload/" );

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
	function obtenerHorariosActividad( $dbh, $ida ){
		//Devuelve los registros de horario de una actividad dado su id
		$q = "select date_format(fecha,'%d/%m/%Y') as fecha, cupo where ACTIVIDAD_id = $ida";
		
		$data = mysqli_query( $dbh, $q );
		return obtenerListaRegistros( $data );
	}
	/* --------------------------------------------------------- */
?>