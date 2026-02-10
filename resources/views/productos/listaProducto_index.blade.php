@extends('layouts.app')

@section('title','productos')

@push('css-datatable')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')

<div class="container mt-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>LISTA <small class="text-muted">PRODUCTOS FARMACEUTICOS</small></h3>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">PRODUCTOS</h5>
        </div>
        <div class="card-body">
          <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal">NUEVO REGISTRO
          <a href="/reporteExcel" target="_blank" class="btn btn-success" >REPORTE EXCEL</a>
          <a href="rerportepdf" target="_blank" class="btn btn-danger" >REPORTE PDF</a>
</button>

          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>NOMBRE</th>
                <th>STOCK</th>
                <th>PRECIO COMPRA</th>
                <th>PRECIO VENTA</th>
                <th>CATEGORIA</th>
                <th>PRESENTACION</th>
                <th>LABORATORIO</th>
                <th>PROVEEDOR</th>
                <th>EMAIL</th>
                <th>TELEFONO</th>
                <th>DIRECCION</th>     
                <th>ESTADO</th>
                <th>FECHA DE REG.</th>
                <th>FECHA DE VENCIMIENTO</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              <?php $con = 1; ?>
              @foreach($lis_producto as $value2)
              <tr>
                <td>{{ $con++ }}</td>

                <td>{{ $value2->prod_nombre }}</td>
                <td>{{ $value2->prod_cantidad }}</td>
                <td>{{ $value2->prod_precio_compra }}</td>
                <td>{{ $value2->prod_precio_venta }}</td>
                <td>{{ $value2->ca_nombre }}</td>
                <td>{{ $value2->pre_nombre }}</td>
                <td>{{ $value2->la_nombre }}</td>
                <td>{{ $value2->pro_nombre }}</td>
                <td>{{ $value2->pro_email }}</td>
                <td>{{ $value2->pro_telefono }}</td>
                <td>{{ $value2->pro_direccion }}</td>
                <td>
                  <?php if($value2->prod_estado=='ACTIVO'){ ?>
                    <span style="border: white 8px ridge;background:#008000;color:#fff">ACTIVO</span>
                  <?php }else{ ?>
                    <span style="border: white 8px ridge;background:#ff0000;color:#fff">INACTIVO</span>
                  <?php } ?>
                </td>
                <td>{{ $value2->prod_fecha_reg }}</td>
                <td>{{ $value2->prod_fecha_vencimiento }}</td>
                <td>
                  <div class="d-flex justify-content-around">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      ACCIÓN
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item" href="#" onclick="editarProducto('<?php echo $value2->idproducto; ?>')">EDITAR</a></li>
                      <li><a class="dropdown-item" href="#" onclick="estadoProducto('<?php echo $value2->idproducto; ?>','<?php echo $value2->prod_estado; ?>')">CAMBIAR ESTADO</a></li>
                    </ul>
                    <div> <!----Separador----->
                      <div class="vr"></div>
                  </div>
                  <div>
                     <button title="Eliminar" onclick="eliminarProducto('<?php echo $value2->idproducto; ?>')" class="btn btn-datatable btn-icon btn-transparent-dark">
                          <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"></path>
                          </svg>
                      </button>  
                  </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Nuevo Registro -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">DATOS DEL REGISTRO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form id="nuevoRegistroProducto" method="post">
          @csrf
            <div class="row ">    
    
                    <div class="col-md-6">
                    <label  class="form-label">NOMBRE</label>
                    <input type="text" id="prod_nombre" name="prod_nombre" class="form-control" required placeholder="Ingresar...">
                    </div>

                    <div class="col-md-6">
                    <label class="form-label">STOCK</label>
                    <input type="text" id="prod_cantidad" name="prod_cantidad" maxlength="5" onkeypress="return valideKey(event);"  class="form-control" required placeholder="Ingresar...">
                    </div>

                    <div class="col-md-6">
                        <label  class="form-label">PRECIO COMPRA</label>
                        <input type="text" id="prod_precio_compra" name="prod_precio_compra" maxlength="12"  onkeypress="return filterFloat(event,this);" class="form-control"  required placeholder="Ingresar...">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">PRECIO VENTA</label>
                        <input type="text" id="prod_precio_venta" name="prod_precio_venta" maxlength="12"  onkeypress="return filterFloat(event,this);" class="form-control"   required placeholder="Ingresar...">
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
                        <input type="date" id="prod_fecha_vencimiento" name="prod_fecha_vencimiento"   class="form-control"   required placeholder="Ingresar...">
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
        
            <div class="modal-footer">
                <button type="submit" id="boton" class="btn btn-primary">GUARDAR DATOS</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarModalLabel">MODIFICAR REGISTRO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="ver_form">
      </div>
    </div>
  </div>
</div>

<script>
    
  function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0' = 48, ‘9' = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
}
function valideKey(evt){
  var code = (evt.which) ? evt.which : evt.keyCode;
  if(code==8) { // backspace.
    return true;
  } else if(code>=48 && code<=57) { // is a number.
    return true;
  } else{ // other keys.
    return false;
  }
}
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


$("#nuevoRegistroProducto").submit(function(event) {
  event.preventDefault();
  var formData=new FormData($("#nuevoRegistroProducto")[0]);

  var idproveedore=$("#idproveedore").val()
  if(idproveedore>0){
    $("#error").html(' ')
    document.getElementById('boton').disabled=true;
    $.ajax({
        url:'/nuevoRegistroProducto',
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


function editarProducto(id) {
  $("#editarModal").modal('show')
  $.post('/editarProducto', {id}, function(data) {
    $("#ver_form").html(data)
  });
}

function eliminarProducto(id) {
  alertify.confirm("¿Está seguro que desea eliminar el registro?", function(e) {
    if (e) {
      alertify.success("Has pulsado  ok");
      $.post('/eliminarProducto', { id:id, _token: '{{csrf_token()}}' }, function() {
        window.location = "";
      });
    } else { alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
  }
  }); 
}

function estadoProducto(id, prod_estado) {
 
  alertify.confirm("<p>ESTA SEGURO QUE DESEA CAMBIAR EL ESTADO? <br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
        if (e) {
          alertify.success("Has pulsado  ok");

          $.post('/estadoProducto', {id,prod_estado}, function() {
            window.location="";
          });

        } else { alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
        }
      }); 

}
</script>

@endsection
