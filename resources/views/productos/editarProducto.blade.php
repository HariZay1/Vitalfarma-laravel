<form id="editarRegistroProducto" method="post">
    @csrf
    <input type="hidden" name="idproducto" value="<?php echo $obj->id ?>" />

    <div class="row g-3">
            <div class="col-md-6">
                <label  class="form-label">NOMBRE</label>
                <input type="text" id="prod_nombre" name="prod_nombre" class="form-control"  value="<?php echo $obj->prod_nombre ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">STOCK</label>
                <input type="text" id="prod_cantidad" name="prod_cantidad" maxlength="5" onkeypress="return valideKey(event);"  class="form-control" value="<?php echo $obj->prod_cantidad?>" required>
            </div>

            <div class="col-md-6">
                <label  class="form-label">PRECIO COMPRA</label>
                <input type="text" id="prod_precio_compra" name="prod_precio_compra" maxlength="12"  onkeypress="return filterFloat(event,this);" class="form-control"  value="<?php echo $obj->prod_precio_compra?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">PRECIO VENTA</label>
                <input type="text" id="prod_precio_venta" name="prod_precio_venta" maxlength="12"  onkeypress="return filterFloat(event,this);" class="form-control"  value="<?php echo $obj->prod_precio_venta?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">CATEGORIA</label>
                <select name="Categoria" class="form-control" required>
                <option></option>
                <?php foreach ($tipo_c as $value1) {  ?>
                    <option value="<?php echo $value1->id ?>"><?php echo $value1->ca_nombre ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">PRESENTACION</label>
                <select name="Presentacion" class="form-control" required>
                <option></option>
                <?php foreach ($tipo_p as $value3) {  ?>
                    <option value="<?php echo $value3->id ?>"><?php echo $value3->pre_nombre ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">FECHA VENCIMIENTO </label>
                <input type="date" id="prod_fecha_vencimiento" name="prod_fecha_vencimiento"   class="form-control"   value="<?php echo $obj->prod_fecha_vencimiento?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">NOMBRE LABORATORIO</label>
                <select name="Laboratorio" onchange="buscarProveedores(this.value)"  class="form-control" required>
                <option></option>
                <?php foreach ($tipo_l as $value4) {  ?>
                    <option value="<?php echo $value4->id ?>"><?php echo $value4->la_nombre ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
            <label class="form-label">NOMBRE PROVEEDOR</label>
            <input type="text" id="pro_nombre" name="pro_nombre"  class="form-control" disabled placeholder="Ingresar...">
            </div>
            <div class="col-md-6">
            <label class="form-label">EMAIL</label>
            <input type="text" id="pro_email" name="pro_email" class="form-control" disabled placeholder="Ingresar...">
            </div>
            <div class="col-md-6">
                <label class="form-label">TELEFONO</label>
                <input type="text" id="pro_telefono" name="pro_telefono" maxlength="8" class="form-control" disabled placeholder="Ingresar...">
            </div>
            <div class="col-md-6">
                <label class="form-label">DIRECCION</label>
                <input type="text" id="pro_direccion" name="pro_direccion" class="form-control" disabled placeholder="Ingresar...">
            </div>
    
            <div class="col-md-6"  id="error"></div>
        </div>
  
          <input type="hidden" id="idproveedore" name="idproveedore">
    </div>
    <div class="modal-footer">
        <button type="submit" id="boton" class="btn btn-primary">ACTUALIZAR</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
  
    </div>
  </form>
  
  <script>
    function buscarProveedores(Laboratorio){
  $.post('/buscarProveedores', {Laboratorio}, function(data) {
    var valores=eval(data)
    if(valores[0]===0){
      $("#idproveedore").val('0')
      $("#pro_nombre").val('')
      $("#pro_email").val('')
      $("#pro_telefono").val('')
      $("#pro_direccion").val('')
    }else{
      $("#idproveedore").val(valores[0])
      $("#pro_nombre").val(valores[1])
      $("#pro_email").val(valores[2])
      $("#pro_telefono").val(valores[3])
      $("#pro_direccion").val(valores[4])
    }
  });
}
    $("#editarRegistroProducto").submit(function(event) {
      event.preventDefault();
    var formData=new FormData($("#editarRegistroProducto")[0]);
  var idproveedore=$("#idproveedore").val()
 if(idproveedore>0){
    $("#error").html(' ')
    document.getElementById('boton').disabled=true;
    $.ajax({
        url:'/editarRegistroProducto',
        type:'POST',
        data:formData,
        cache:false,
        processData:false,
        contentType:false,
        success:function(dat){ 
          alertify.success("<b>Datos enviados...</b>"); 
          alertify.alert("<b style='color: #008000;'>sss</b> ", function () { 
            window.location="";
          }); 
        }
    });
  }else{
    $("#error").html('<br> <b>ERROR DE CLIENTE O PRODUCTO NO SELECCIONADO</b>')
  }
 
});
  </script>