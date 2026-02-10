<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Codedge\Fpdf\Fpdf\Fpdf;
class ventaController extends Controller
{
    public function ventaProductos(){
        $tipo_p = DB::table('presentaciones')->where('pre_estado', '=', 'ACTIVO')->get();
        $tipo_pro = DB::table('proveedores')->where('pro_estado', '=', 'ACTIVO')->get();
        $tipo_c = DB::table('categorias')->where('ca_estado', '=', 'ACTIVO')->get();
        $tipo_l = DB::table('laboratorios')->where('la_estado', '=', 'ACTIVO')->get();
        $tipo_prod = DB::table('productos')->where('prod_estado', '=', 'ACTIVO')->get();
        $listaVenta = DB::select("
        SELECT 
            compras.id AS idcompra,
            compras.co_cantidad,
            compras.co_precio_total,
            compras.fecha_hora,
            clientes.cli_ci,
            clientes.cli_expedido,
            clientes.cli_nombre,
            clientes.cli_paterno,
            clientes.cli_materno,
            clientes.cli_celular,
            productos.prod_cantidad,
            productos.prod_fecha_reg,
            productos.prod_fecha_vencimiento,
            categorias.ca_nombre,
            presentaciones.pre_nombre,
            proveedores.pro_nombre,
            proveedores.pro_email,
            proveedores.pro_direccion
        FROM compras
        INNER JOIN clientes ON compras.idcliente = clientes.id
        INNER JOIN productos ON compras.idproductos = productos.id
        INNER JOIN categorias ON productos.idcategoria = categorias.id
        INNER JOIN presentaciones ON productos.idpresentacione = presentaciones.id
        INNER JOIN proveedores ON productos.idproveedore = proveedores.id
    ");
    return view('ventas.ventaProductos_index', compact('tipo_prod','tipo_p','tipo_pro','tipo_c','tipo_l','listaVenta'));
    
    }

    public function buscarCarnet(Request $request){
        $carnet=$request->post('carnet');
        $obj=DB::table("clientes")->where('cli_ci','=',$carnet)->where('cli_estado','=','ACTIVO')->first();
        if ($obj) {
            $data=array(
                0=>$obj->id,
                1=>$obj->cli_nombre,
                2=>$obj->cli_paterno,
                3=>$obj->cli_materno,
                4=>$obj->cli_celular
            );
        }else{
            $data=array( 0=>0 );
        }
        echo json_encode($data);
    }
    public function buscarProducto(Request $request) {
        $nombre = $request->get('prod_nombre'); 
     
        $obj = DB::table('productos')
            ->join('categorias', 'productos.idcategoria', '=', 'categorias.id')
            ->join('presentaciones', 'productos.idpresentacione', '=', 'presentaciones.id')
            ->join('proveedores', 'productos.idproveedore', '=', 'proveedores.id')
            ->where('productos.prod_nombre', '=', $nombre)
            ->where('productos.prod_estado', '=', 'ACTIVO')
            ->select(
                'productos.id',
                'productos.prod_nombre',
                'categorias.ca_nombre',
                'presentaciones.pre_nombre',
                'proveedores.pro_nombre',
                'proveedores.pro_email',  
                'proveedores.pro_direccion', 
                'productos.prod_precio_venta', 
                'productos.prod_fecha_vencimiento'
            )
            ->first();

        if ($obj) {
            $data = array(
                0 => $obj->id,
                1 => $obj->prod_nombre,
                2 => $obj->ca_nombre,
                3 => $obj->pre_nombre,
                4 => $obj->pro_nombre,
                5 => $obj->pro_email,
                6 => $obj->pro_direccion,
                7 => $obj->prod_precio_venta,
                8 => $obj->prod_fecha_vencimiento
            );
        } else {
            $data = array(0 => 0); 
        }
    
        return response()->json($data); 
    }
    
    

    public function nuevoRegistroVenta(Request $request){
        $idcliente=$request->post('idcliente');
        $idproducto=$request->post('idproducto');

        $validar=DB::table("productos")->where('id','=',$idproducto)->first();
        if($validar){
            $obj=Producto::find($idproducto);
            $obj->prod_cantidad=$validar->prod_cantidad-1;
            $obj->save();

            $obj=new Compra();
            $obj->co_precio_total=$validar->prod_precio_venta;
            $obj->co_cantidad=1;
            $obj->fecha_hora=date('Y-m-d');
            $obj->idcliente=$idcliente;
            $obj->idproducto=$idproducto;
            $obj->save();

        }else{
            echo json_encode(array( 0=>0 ));
        }
    }
    


    public  function reporteExcel(){
        $listaVenta=DB::select("SELECT compras.id as idcompra,compras.*,clientes.*,movilidades.*,tipo_marcas.*  FROM compras
        INNER JOIN clientes ON compras.idcliente = clientes.id
        INNER JOIN movilidades ON compras.idmovilidades = movilidades.id
        INNER JOIN tipo_marcas ON movilidades.tipo_marcas_id = tipo_marcas.id
        WHERE compras.co_estado!='ELIMINADO' ");
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=reporteHojaRutaExcel.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo "\xEF\xBB\xBF";
        echo '<table class="table">
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
                <th>TIPO MARCA</th>
                <th>MODELO</th>
                <th>COLOR</th>
                <th>TRANSMISION</th>
                <th>KILOMETRAJE</th>
                <th>ESTADO</th>
                <th>FECHA REG.</th>
              </tr>
            </thead>
            <tbody>';
            $con=1;
            foreach ($listaVenta as $value2) {
                echo '<tr>
                  <td>'.$con++.'</td>
                  <td>'.$value2->cli_ci.'</td>
                  <td>'.$value2->cli_expedido.'</td>
                  <td>'.$value2->cli_nombre.'</td>
                  <td>'.$value2->cli_paterno.'</td>
                  <td>'.$value2->cli_materno.'</td>
                  <td>'.$value2->cli_celular.'</td>
                  <td>'.$value2->co_cantidad.'</td>
                  <td>'.$value2->co_precio_total.'</td>
                  <td>'.$value2->tipo_nombres.'</td>
                  <td>'.$value2->mo_modelo.'</td>
                  <td>'.$value2->mo_color.'</td>
                  <td>'.$value2->mo_trasmision.'</td>
                  <td>'.$value2->mo_kilometraje.'</td>
                  <td>'.$value2->co_estado.'</td>
                  <td>'.$value2->co_fecha_reg.'</td>
                </tr>';
            }
            

        echo '</tbody>
          </table>';

    }
 

}
