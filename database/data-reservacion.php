<?php
	/* --------------------------------------------------------- */
	/* CBC - Datos sobre Reservaciones */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	function obtenerReservacionPorId( $dbh, $idr ){
		// Devuelve el registro de una reservación dado su id

		mysqli_query( $dbh, "SET lc_time_names = 'es_ES';" );
		$q = "select r.id, r.nombre, r.apellido, r.email, r.telefono, r.estado, 
		r.token_creacion as token, r.usuario_registro, r.usuario_cancelacion, r.usuario_modificacion, 
		a.id as ida, a.nombre as actividad, a.descripcion, a.imagen, h.id as idhorario, 
		date_format(h.fecha,'%W %d de %M %h:%i %p') as fecha, 
		date_format(r.fecha,'%d/%m/%Y %h:%i %p') as fecha_registro,
		date_format(r.fecha_cambio,'%d/%m/%Y %h:%i %p') as fecha_actualizacion, 
		date_format(r.fecha_cancelacion,'%d/%m/%Y %h:%i %p') as fecha_cancelacion, 
		( NOW() >= h.fecha ) as fecha_pasada
		from actividad a, horario h, reservacion r where r.HORARIO_id = h.id and 
		h.ACTIVIDAD_id = a.id and r.id = $idr";
		
		$data = mysqli_query( $dbh, $q );
		$data ? $registro = mysqli_fetch_array( $data ) : $registro = NULL;
		
		return $registro;
	}
	/* --------------------------------------------------------- */
	function obtenerReservacionPorToken( $dbh, $token ){
		// Devuelve el registro de una reservación

		mysqli_query( $dbh, "SET lc_time_names = 'es_ES';" );
		$q = "select r.id, r.nombre, r.apellido, r.email, r.telefono, r.estado, 
		a.nombre as actividad, a.descripcion, a.imagen, 
		date_format(h.fecha,'%W %d de %M %h:%i %p') as fecha  
		from actividad a, horario h, reservacion r where r.HORARIO_id = h.id and 
		h.ACTIVIDAD_id = a.id and r.token_creacion = '$token'";
		
		$data = mysqli_query( $dbh, $q );
		$data ? $registro = mysqli_fetch_array( $data ) : $registro = NULL;
		return $registro;
	}
	/* --------------------------------------------------------- */
	function obtenerTokenReservacion( $param ){
		//Genera un código provisional enviado por email para confirmar y verificar cuenta
		$fecha = date_create();
		$date = date_timestamp_get( $fecha );
		return sha1( md5( $date.$param ) );
	}
	/* --------------------------------------------------------- */
	function reservar( $dbh, $reservacion ){
		// Procesa el registro de nueva reservación
		$estado = "pendiente";
		$q = "insert into reservacion (fecha, nombre, apellido, email, 
		telefono, token_creacion, estado, HORARIO_id) 
		values ( NOW(), '$reservacion[nombre]', '$reservacion[apellido]', 
		'$reservacion[email]', '$reservacion[telefono]', '$reservacion[token]', 
		'$estado', $reservacion[horario] )";

		$data = mysqli_query( $dbh, $q );
		return mysqli_insert_id( $dbh );
	}
	/* --------------------------------------------------------- */
	function cancelarReservacion( $dbh, $idr ){
		// Cambia una reservación a estado cancelada
		$actualizado = 1;
		$estado = "cancelada";
		$q = "update reservacion set estado = '$estado', fecha_cancelacion = NOW() 
		where id = $idr";
		
		mysqli_query ( $dbh, $q );
		if( mysqli_affected_rows( $dbh ) == -1 ) $actualizado = 0;
		
		return $actualizado;
	}
	/* --------------------------------------------------------- */
	function cuposTomados( $dbh, $idh ){
		// Devuelve la cantidad de reservaciones de una actividad que cubren un cupo
		// Reservaciones en estado: 'pendiente', 'efectiva', 'caducada'
		$q = "select count(id) as reservados from reservacion 
		where estado <> 'cancelada' and HORARIO_id = $idh";
		
		$data = mysqli_query( $dbh, $q );
		$data ? $registro = mysqli_fetch_array( $data ) : $registro = NULL;
		return $registro;
	}
	/* --------------------------------------------------------- */
	function obtenerHorarioPorId( $dbh, $id ){
		// Devuelve los datos de un horario dado su id
		$q = "select id, date_format(fecha,' %d/%m %h:%i %p') as fecha, cupo 
		from horario where id = $id";
		
		$data = mysqli_query( $dbh, $q );
		$data ? $registro = mysqli_fetch_array( $data ) : $registro = NULL;
		return $registro;
	}
	/* --------------------------------------------------------- */
	function cuposDisponibles( $dbh, $idh ){
		// Devuelve la cantidad de cupos disponibles de una actividad en un horario
		$horario = obtenerHorarioPorId( $dbh, $idh );
		$cupo_h = $horario["cupo"];
		$tomados = cuposTomados( $dbh, $idh );

		return $cupo_h - $tomados["reservados"];
	}
	/* --------------------------------------------------------- */
	if( isset( $_POST["reservar"] ) ){ 
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );
		include( "../fn/fn-mailing.php" );
		
		parse_str( $_POST["reservar"], $reservacion );
		$reservacion = escaparCampos( $dbh, $reservacion );
		$reservacion["token"] = obtenerTokenReservacion( $reservacion["email"] );
		
		if( cuposDisponibles( $dbh, $reservacion["horario"] ) > 0 ){
			
			$rsp = reservar( $dbh, $reservacion );
			
			if( $rsp != 0 ){
				$res["exito"] = 1;
				$reservacion["id"] = $rsp;
				$res["mje"] = "¡Su reservación se ha registrado con éxito!";
				$reservacion = obtenerReservacionPorId( $dbh, $rsp );
				enviarMensajeEmail( "nueva_reservacion", $reservacion, $reservacion["email"] );
			}else{
				$res["exito"] = -1;
				$res["mje"] = "Error al registrar reservación";
			}
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Disculpe, ya los cupos están agotados para este horario";	
		}

		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	if( isset( $_POST["cancelar_r"] ) ){ 
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );
		include( "../fn/fn-mailing.php" );

		$token = $_POST["cancelar_r"];
		$reservacion = obtenerReservacionPorToken( $dbh, $token );
		$rsp = 1;//cancelarReservacion( $dbh, $reservacion["id"] );
		
		if( $rsp != 0 ){
			$res["exito"] = 1;
			$res["mje"] = "Su reservación se ha cancelado con éxito";
			$reservacion = obtenerReservacionPorId( $dbh, $reservacion["id"] );
			enviarMensajeEmail( "cancelacion_reservacion", $reservacion, $reservacion["email"] );
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al cancelar reservación";
		}

		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
?>