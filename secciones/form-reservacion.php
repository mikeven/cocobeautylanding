<div class="modal fade" id="form-reservacion" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">¿Está seguro que desea reservar para la actividad?</h5>
        <div class="text-center"><span id="frm_nactividad"></span></div>
        <div class="text-center">Fecha: <span id="frm_fecha_act" class="rosa-chanel"></span></div>
        <div class="text-center">Hora: <span id="frm_hora_act" class="rosa-chanel"></span></div>
      </div>
      <div id="campos_reservacion" class="modal-body">
        <form id="frm-reservacion" method="post">
          <div class="row">
            <input type="hidden" name="id-actividad" value="<?php echo $ida ?>">
            <input type="hidden" id="id-horario" name="horario" value>
            <input type="hidden" id="fe_hr" name="fecha_act" value>
            <input type="hidden" id="nactividad" name="nactividad" value>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
              </div>
              <div class="form-group">
                <label for="email" class="col-form-label">Correo:</label>
                <input type="email" class="form-control" name="email" required>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="apellido" class="col-form-label">Apellido:</label>
                <input type="text" class="form-control" name="apellido" required>
              </div>
              <div class="form-group">
                <label for="telefono" class="col-form-label">Teléfono:</label>
                <input type="text" class="form-control" name="telefono" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
              <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="aceptacion" id="condicion" required>
                    <label class="form-check-label form-agreement-label" for="condicion">Estoy de acuerdo con los términos de uso </label>
                    <p class="tiny">"DE CONFORMIDAD CON LA LEY DE PROTECCIÓN DE DATOS PERSONALES Y ACCIÓN DE HABEAS DATA, LOS DATOS SUMINISTRADOS A PARTIR DEL 25 DE NOVIEMBRE QUEDARÁN INCORPORADOS EN LA BASE DE DATOS “CLIENTES CHANEL”, LA CUAL SERÁ PROCESADA EXCLUSIVAMENTE PARA AGENDAR SU CITA EN EL LOS BEAUTY PANELS. ESOS DATOS SE RECOGERÁN A TRAVÉS DE MEDIOS LEGÍTIMOS Y SÓLO SERÁN LOS IMPRESCINDIBLES PARA PODER PRESTAR EL SERVICIO REQUERIDO. LOS DATOS PERSONALES SERÁN TRATADOS CON EL GRADO DE PROTECCIÓN ADECUADO, TOMÁNDOSE LAS MEDIDAS DE SEGURIDAD NECESARIAS PARA EVITAR SU ALTERACIÓN, PÉRDIDA, TRATAMIENTO O ACCESO NO AUTORIZADO POR PARTE DE TERCEROS.". </p>
              </div>
            </div>
          </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-dark">Reservar</button>
          </div>
        </form>
      </div>
      <div id="contenido_reservacion" class="modal-body text-center">
        <div id="respuesta_reservacion"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div> 
      </div>
    </div>
  </div>
</div>