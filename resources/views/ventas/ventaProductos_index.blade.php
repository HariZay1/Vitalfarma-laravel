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
          <h5 class="card-title">VENTAS</h5>
        </div>

        <div class="card-body">
          <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal">NUEVO REGISTRO</button>
          <a href="/reporteExcel" target="_blank" class="btn btn-success" >REPORTE EXCEL</a>
          <a href="rerportepdf" target="_blank" class="btn btn-danger" >REPORTE PDF</a>

          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>CARNET</th>
                <th>EXP</th>
                <th>NOMBRE</th>
                <th>PATERNO</th>
                <th>MATERNO</th>
                <th>CELULAR</th>
                <th>CANTIDAD</th>
                <th>PRECIO TOTAL</th>
                <th>CATEGORIA</th>
                <th>PRESENTACION</th>
                <th>LABORATORIO</th>
                <th>PROVEEDOR</th>
                <th>EMAIL</th>
                <th>DIRECCION</th>    
                <th>FECHA DE REG.</th>
                <th>FECHA DE VENCIMIENTO</th>
              </tr>
            </thead>
            <tbody>
              <?php $con = 1; ?>
              @foreach($listaVenta as $value6)
              <tr>
                  <td>{{ $con++ }}</td>
                  <td>{{ $value6->cli_ci }}</td>
                  <td>{{ $value6->cli_expedido }}</td>
                  <td>{{ $value6->cli_nombre }}</td>
                  <td>{{ $value6->cli_paterno }}</td>
                  <td>{{ $value6->cli_materno }}</td>
                  <td>{{ $value6->cli_celular }}</td>
                  <td>{{ $value6->prod_cantidad }}</td>
                  <td>{{ $value6->co_precio_total }}</td>
                  <td>{{ $value6->ca_nombre }}</td>
                  <td>{{ $value6->pre_nombre }}</td>
                  <td>{{ $value6->pro_nombre }}</td>
                  <td>{{ $value6->pro_email }}</td>
                  <td>{{ $value6->pro_direccion }}</td>
                  <td>{{ $value6->prod_fecha_reg }}</td>
                  <td>{{ $value6->prod_fecha_vencimiento }}</td>
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
        <form id="nuevoRegistroVenta" method="post">
          @csrf
            <div class="row ">    

                <div class="col-md-3">
                    <label  class="form-label">CARNET</label>
                    <input type="text" id="carnet" name="carnet"onkeyup="buscarCarnet(this.value)"  class="form-control" required placeholder="Ingresar...">
                    </div>

                    <div class="col-md-3">
                    <label  class="form-label">NOMBRE</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" disabled placeholder="Ingresar...">
                    </div>

                    <div class="col-md-3">
                    <label class="form-label">PATERNO</label>
                    <input type="text" id="paterno" name="paterno"  class="form-control" disabled placeholder="Ingresar...">
                    </div>

                    <div class="col-md-3">
                        <label  class="form-label">MATERNO</label>
                        <input type="text" id="materno" name="materno" class="form-control" disabled placeholder="Ingresar...">
                    </div>
                
                    <div class="col-md-3">
                        <label class="form-label">PRODUCTO</label>
                        <select name="Producto" onchange="buscarProducto(this.value)" class="form-control" required>
                          <option value="">Seleccione un producto</option>
                          <?php foreach ($tipo_prod as $value4) { ?>
                              <option value="<?php echo $value4->prod_nombre; ?>"><?php echo $value4->prod_nombre; ?></option>
                          <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">CATEGORIA</label>
                        <input type="text" id="ca_nombre" name="ca_nombre" class="form-control" disabled placeholder="Ingresar...">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label">PRESENTACION</label>
                      <input type="text" id="pre_nombre" name="pre_nombre" class="form-control" disabled placeholder="Ingresar...">
                    
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">NOMBRE LABORATORIO</label>
                    <input type="text" id="la_nombre" name="la_nombre" class="form-control" disabled placeholder="Ingresar...">
                  
                </div>
                    <div class="col-md-3">
                    <label class="form-label">NOMBRE</label>
                    <input type="text" id="pro_nombre" name="pro_nombre"  class="form-control" disabled placeholder="Ingresar...">
                    </div>
                    <div class="col-md-3">
                    <label class="form-label">EMAIL</label>
                    <input type="text" id="pro_email" name="pro_email" class="form-control" disabled placeholder="Ingresar...">
                    </div>
    
                    <div class="col-md-3">
                        <label class="form-label">DIRECCION</label>
                        <input type="text" id="pro_direccion" name="pro_direccion" class="form-control" disabled placeholder="Ingresar...">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">PRECIO VENTA</label>
                        <input type="text" id="prod_precio_venta" name="prod_precio_venta" class="form-control" disabled placeholder="Ingresar...">
                    </div>
                  
                    <div class="col-md-3">
                        <label class="form-label">FECHA VENCIMIENTO </label>
                        <input type="date" id="prod_fecha_vencimiento" name="prod_fecha_vencimiento"   class="form-control"   disabled placeholder="Ingresar...">
                    </div>

                <div class="col-md-2"  id="error"></div>
            </div>
            <input type="hidden" id="idcliente" name="idcliente">
              <input type="hidden" id="idproducto" name="idproducto">
        
            <div class="modal-footer">
                <button type="submit" id="boton" class="btn btn-primary">GUARDAR DATOS</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
 function buscarCarnet(carnet){
  $.post('/buscarCarnet', {carnet}, function(data) {
    var valores=eval(data)
    if(valores[0]===0){
      $("#idcliente").val('0')
      $("#nombre").val('')
      $("#paterno").val('')
      $("#materno").val('')
    }else{
      $("#idcliente").val(valores[0])
      $("#nombre").val(valores[1])
      $("#paterno").val(valores[2])
      $("#materno").val(valores[3])
    }
  });

}
function buscarProducto(Producto) {
    if (Producto === "") {
        return;
    }

    fetch(`/buscarProducto?prod_nombre=${prodId}`)
        .then(response => response.json())
        .then(data => {
            if (data[0] !== 0) {
                document.getElementById('ca_nombre').value = data[2]; 
                document.getElementById('pre_nombre').value = data[3]; 
                document.getElementById('la_nombre').value = data[4]; 
                document.getElementById('pro_nombre').value = data[4]; 
                document.getElementById('pro_email').value = data[5]; 
                document.getElementById('pro_direccion').value = data[6]; 
                document.getElementById('prod_precio_venta').value = data[7]; 
                document.getElementById('prod_fecha_vencimiento').value = data[8]; 
            } else {
                alert("Producto no encontrado o no está activo.");
            }
        })
        .catch(error => console.error("Error al obtener los datos del producto: ", error));
}


$("#nuevoRegistroVenta").submit(function(event) {
  event.preventDefault();
  var formData=new FormData($("#nuevoRegistroVenta")[0]);
  var idcliente=$("#idcliente").val()
  var idmovilidades=$("#idproducto").val()
  if(idcliente>0 && idproducto>0){
    $("#error").html(' ')
    document.getElementById('boton').disabled=true;
    $.ajax({
        url:'/nuevoRegistroVenta',
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

@endsection
