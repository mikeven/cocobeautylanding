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
                    <p class="tiny">"De conformidad con la Ley Nº 18.331, de Protección de Datos Personales y Acción de Habeas Data, de 11 de agosto de 2008, los datos suministrados a partir del 17 de diciembre quedarán incorporados en la Base de Datos “Clientes Chanel”, la cual será procesada exclusivamente para agendar su cita en el COCO BEAUTY CLUB. Esos datos se recogerán a través de medios legítimos y sólo serán los imprescindibles para poder prestar el servicio requerido. Los datos personales serán tratados con el grado de protección adecuado, tomándose las medidas de seguridad necesarias para evitar su alteración, pérdida, tratamiento o acceso no autorizado por parte de terceros. El responsable de la Base de Datos es (Bylasol S.A.) y la dirección donde el titular podrá ejercer los derechos de acceso, rectificación, actualización, inclusión o supresión es Ruta 101 Km 26.200, Canelones". </p>
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