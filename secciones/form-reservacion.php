<div class="modal fade" id="form-reservacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">¿Está seguro que desea reservar para la actividad?</h5>
        <div class="text-center"><span id="frm_nactividad"></span></div>
        <div class="text-center">Fecha: <span id="frm_fecha_act" class="rosa-chanel"></span></div>
        <div class="text-center">Hora: <span id="frm_hora_act" class="rosa-chanel"></span></div>
      </div>
      <div class="modal-body row">
        <form id="frm-reservacion">
          <input type="hidden" name="id-actividad" value="<?php echo $ida ?>">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="nombre" class="col-form-label">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
              <label for="apellido" class="col-form-label">Correo:</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="apellido" class="col-form-label">Apellido:</label>
              <input type="text" class="form-control" id="apellido" name="nombre">
            </div>
            <div class="form-group">
              <label for="apellido" class="col-form-label">Teléfono:</label>
              <input type="text" class="form-control" id="telefono" name="telefono">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-dark">Reservar</button>
      </div>
    </div>
  </div>
</div>