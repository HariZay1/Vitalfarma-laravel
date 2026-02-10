@extends('layouts.app')

@section('title','clientes')

@push('css-datatable')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')

<div class="container mt-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>LISTA DE<small class="text-muted">PRESENTACIONES</small></h3>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">PRESENTACIONES</h5>
        </div>
        <div class="card-body">
          <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal">NUEVO REGISTRO</button>

          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>NOMBRE</th>
                <th>ESTADO</th>
                <th>FECHA REG.</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              <?php $con = 1; ?>

              @foreach($lis_presentacion as $value)
              <tr>
                <td>{{ $con++ }}</td>
                <td>{{ $value->pre_nombre }}</td>
                <td>
                  <?php if($value->pre_estado=='ACTIVO'){ ?>
                    <span style="border: white 8px ridge;background:#008000;color:#fff">ACTIVO</span>
                  <?php }else{ ?>
                    <span style="border: white 8px ridge;background:#ff0000;color:#fff">INACTIVO</span>
                  <?php } ?>
                </td>
                <td><?php echo $value->pre_fecha_reg ?></td>
                <td>
                  <div class="d-flex justify-content-around">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      ACCIÓN
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item" href="#" onclick="editarPresentacion('{{ $value->id }}')">EDITAR</a></li>

                      <li><a class="dropdown-item" href="#" onclick="estadoPresentacion('{{ $value->id }}', '{{ $value->pre_estado }}')">CAMBIAR ESTADO</a></li>
                    </ul>
                    <div> <!----Separador----->
                      <div class="vr"></div>
                  </div>

                  <div>

                    <button title="Eliminar" onclick="eliminarPresentacion('<?php echo $value->id; ?>')" class="btn btn-datatable btn-icon btn-transparent-dark">
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="nuevoRegistroPresentacion" method="post">
          @csrf
          <div class="row g-3">
          
            <div class="col-md-6">
              <label for="pre_nombres" class="form-label">NOMBRE PRESENTACION</label>
              <input type="text" id="pre_nombres" name="pre_nombre" class="form-control" required placeholder="Ingresar...">
              <input type="hidden" id="id" name="id">
            </div>

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
$("#nuevoRegistroPresentacion").submit(function(event) {
  event.preventDefault();

  document.getElementById('boton').disabled=true;
  
  $.ajax({
    url: '/nuevoRegistroPresentacion',
    type: 'POST',
    data: $("form").serialize(),
    success:function(){
      window.location="";
    }
  })
}); 


function estadoPresentacion(id,pre_estado){

  alertify.confirm("<p>ESTA SEGURO QUE DESEA CAMBIAR EL ESTADO? <br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
        if (e) {
          alertify.success("Has pulsado  ok");

          $.post('/estadoPresentacion', {id,pre_estado}, function() {
            window.location="";
          });

        } else { alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
        }
      }); 

}
function editarPresentacion(id,pre_nombres){

$("#myModal").modal('show')
$("#id").val(id)
$("#pre_nombres").val(pre_nombres)

}


function eliminarPresentacion(id) {
  alertify.confirm("¿Está seguro que desea eliminar el registro?", function(e) {
    if (e) {
      alertify.success("Has pulsado  ok");
      $.post('/eliminarPresentacion', { id:id, _token: '{{csrf_token()}}' }, function() {
        window.location = "";
      });
    } else { alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
  }
  }); 
}

</script>
@endsection
