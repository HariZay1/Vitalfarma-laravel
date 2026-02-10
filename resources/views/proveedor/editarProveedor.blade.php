<form id="editarRegistroProveedor" method="post">
  @csrf
  <input type="hidden" name="idproveedores" value="<?php echo $obj->id ?>" />

  <div class="row g-3">
      <div class="col-md-6">
          <label  class="form-label">NOMBRE</label>
          <input type="text" id="pro_nombre" name="pro_nombre" class="form-control" value="<?php echo $obj->pro_nombre ?>" required>
      </div>
      <div class="col-md-6">
          <label  class="form-label">EMAIL</label>
          <input type="text" id="pro_email" name="pro_email" class="form-control" value="<?php echo $obj->pro_email ?>" required>
      </div>
      <div class="col-md-6">
          <label class="form-label">TELEFONO</label>
          <input type="text" id="pro_telefono" name="pro_telefono" class="form-control" value="<?php echo $obj->pro_telefono?>" required>
      </div>
      <div class="col-md-6">
          <label  class="form-label">DIRECCION</label>
          <input type="text" id="pro_direccion" name="pro_direccion" class="form-control" value="<?php echo $obj->pro_direccion ?>" required>
      </div>
     
      <div class="col-md-6">
        <label class="form-label">NOMBRE LABORATORIO</label>
        <select name="Laboratorio" class="form-control" required>
          <option></option>
          <?php foreach ($tipo_l as $value1) {  ?>
            <option value="<?php echo $value1->id ?>"><?php echo $value1->la_nombre ?></option>
          <?php } ?>
        </select>
      </div>
  </div>
  <div class="modal-footer">
      <button type="submit" id="boton" class="btn btn-primary">ACTUALIZAR</button>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>

  </div>
</form>
<script>
  $("#editarRegistroProveedor").submit(function(event) {
    event.preventDefault();
  var formData=new FormData($("#editarRegistroProveedor")[0]);
  document.getElementById('boton').disabled=true;
  $.ajax({
      url:'/editarRegistroProveedor',
      type:'POST',
      data:formData,
      cache:false,
      processData:false,
      contentType:false,
      success:function(dat){ 
        alertify.success("<b>Datos enviados...</b>"); 
        alertify.alert("<b style='color: #008000;'>DATOS ENVIADOS</b> ", function () { 
          window.location="";
        }); 
      }
  });
  });
</script>