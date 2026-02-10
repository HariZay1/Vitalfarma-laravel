<form id="editarRegistroCliente" method="post">
  @csrf
  <input type="hidden" name="idcliente" value="<?php echo $obj->id ?>" />

  <div class="row g-3">
    <div class="col-md-6">
      <label for="ci" class="form-label">CARNET</label>
      <input type="text" id="ci" name="ci" value="<?php echo $obj->cli_ci ?>" maxlength="10" class="form-control" required placeholder="Ingresar..">
    </div>
    <div class="col-md-6">
      <label for="expedido" class="form-label">EXPEDIDO</label>
      <select name="expedido" id="expedido" class="form-select">
        <option value="LP" <?php if($obj->cli_expedido=='LP') echo "selected"; ?>>LA PAZ</option>
        <option value="PD" <?php if($obj->cli_expedido=='PD') echo "selected"; ?>>PANDO</option>
        <option value="CBB" <?php if($obj->cli_expedido=='CBB') echo "selected"; ?>>COCHABAMBA</option>
        <option value="TJ" <?php if($obj->cli_expedido=='TJ') echo "selected"; ?>>TARIJA</option>
        <option value="BN" <?php if($obj->cli_expedido=='BN') echo "selected"; ?>>BENI</option>
        <option value="OR" <?php if($obj->cli_expedido=='OR') echo "selected"; ?>>ORURO</option>
        <option value="PT" <?php if($obj->cli_expedido=='PT') echo "selected"; ?>>POTOSI</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="nombre" class="form-label">NOMBRE</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo $obj->cli_nombre ?>" class="form-control" required placeholder="Ingresar..">
    </div>
    <div class="col-md-6">
      <label for="paterno" class="form-label">PATERNO</label>
      <input type="text" id="paterno" name="paterno" value="<?php echo $obj->cli_paterno ?>" class="form-control" required placeholder="Ingresar..">
    </div>
    <div class="col-md-6">
      <label for="materno" class="form-label">MATERNO</label>
      <input type="text" id="materno" name="materno" value="<?php echo $obj->cli_materno ?>" class="form-control" required placeholder="Ingresar..">
    </div>
    <div class="col-md-6">
      <label for="celular" class="form-label">CELULAR</label>
      <input type="text" id="celular" name="celular" value="<?php echo $obj->cli_celular ?>" maxlength="8" class="form-control" required placeholder="Ingresar..">
    </div>
  </div>

  <div class="modal-footer mt-3">
    <button type="submit" id="boton" class="btn btn-primary">GUARDAR DATOS</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
  </div>
</form>

<script>
  $("#editarRegistroCliente").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton').disabled = true;

    $.ajax({
      url: '/editarRegistroCliente',
      type: 'POST',
      data: $(this).serialize(),
      success: function() {
        window.location = "";
      }
    });
  });
</script>

