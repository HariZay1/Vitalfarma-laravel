<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use Codedge\Fpdf\Fpdf;
require('fpdf.php');
class productoController extends Controller
{
     
    public function listaProducto()
    {  
         $tipo_p = DB::table('presentaciones')->where('pre_estado', '=', 'ACTIVO')->get();
        $tipo_pro = DB::table('proveedores')->where('pro_estado', '=', 'ACTIVO')->get();
        $tipo_c = DB::table('categorias')->where('ca_estado', '=', 'ACTIVO')->get();
        $tipo_l = DB::table('laboratorios')->where('la_estado', '=', 'ACTIVO')->get();

        $lis_producto=DB::select("SELECT productos.id as idproducto,productos.*,categorias.*,presentaciones.*,proveedores.*,laboratorios.*  FROM productos
        INNER JOIN categorias ON productos.idcategoria = categorias.id
         INNER JOIN presentaciones ON productos.idpresentacione = presentaciones.id
        INNER JOIN proveedores ON productos.idproveedore = proveedores.id
        INNER JOIN laboratorios ON proveedores.laboratorios_id = laboratorios.id
        WHERE productos.prod_estado!='ELIMINADO' ");
    
        return view('productos.listaProducto_index', compact('tipo_p','tipo_pro','tipo_c','tipo_l', 'lis_producto'));
    }

    public function buscarProveedores(Request $request){
        $Laboratorio=$request->post('Laboratorio');
        $obj=DB::table("proveedores")->where('laboratorios_id','=',$Laboratorio)->first();
        if ($obj) {
            $data=array(
                0=>$obj->id,
                1=>$obj->pro_nombre,
                2=>$obj->pro_email,
                3=>$obj->pro_telefono,
                4=>$obj->pro_direccion
            );
        }else{
            $data=array( 0=>0 );
        }
        echo json_encode($data);
    }

    public function nuevoRegistroProducto(Request $request) {
        $idcategoria = $request->post('Categoria');
        $idpresentacione = $request->post('Presentacion');
        $idproveedore=$request->post('idproveedore');
        $validar=DB::table("proveedores")->where('id','=',$idproveedore)->first();
        if($validar){
            $obj = new Producto();
            $obj->prod_nombre = mb_strtoupper($request->post('prod_nombre'), 'utf-8');
            $obj->prod_cantidad = $request->post('prod_cantidad');
            $obj->prod_precio_compra = $request->post('prod_precio_compra');
            $obj->prod_precio_venta = $request->post('prod_precio_venta');
            $obj->prod_estado = 'ACTIVO';
            $obj->prod_fecha_reg=date('Y-m-d');
            $obj->prod_fecha_vencimiento=$request->post('prod_fecha_vencimiento');
            $obj->idcategoria =$idcategoria ;
            $obj->idpresentacione =$idpresentacione;
            $obj->idproveedore =$idproveedore;
            $obj->save();

        }else{
            echo json_encode(array( 0=>0 ));
        }
    }

    public function editarProducto(Request $request)   {
        $idproductos= $request->post('id');
        $obj = DB::table("productos")->where('id', '=', $idproductos)->first();
        $tipo_p = DB::table('presentaciones')->where('pre_estado', '=', 'ACTIVO')->get();
        $tipo_pro = DB::table('proveedores')->where('pro_estado', '=', 'ACTIVO')->get();
        $tipo_c = DB::table('categorias')->where('ca_estado', '=', 'ACTIVO')->get();
        $tipo_l = DB::table('laboratorios')->where('la_estado', '=', 'ACTIVO')->get();
    
        return view('productos.editarProducto', compact('obj','tipo_p','tipo_pro','tipo_c','tipo_l', 'lis_producto'))->render();

    }
    
    public function editarRegistroProducto(Request $request){
        $idcategoria = $request->post('Categoria');
        $idpresentacione = $request->post('Presentacion');
        $idproveedore=$request->post('idproveedore');
        $validar=DB::table("proveedores")->where('id','=',$idproveedore)->first();
        if($validar){
            $idproducto = $request->post('idproducto');
            $obj = Producto::find($idproducto);
            if ($obj) {
            $obj->prod_nombre = mb_strtoupper($request->post('prod_nombre'), 'utf-8');
            $obj->prod_cantidad = $request->post('prod_cantidad');
            $obj->prod_precio_compra = $request->post('prod_precio_compra');
            $obj->prod_precio_venta = $request->post('prod_precio_venta');
            $obj->prod_fecha_vencimiento=$request->post('prod_fecha_vencimiento');
            $obj->idcategoria =$idcategoria ;
            $obj->idpresentacione =$idpresentacione;
            $obj->idproveedore =$idproveedore;
            $obj->save();
            return response()->json(['status' => 'success', 'message' => 'Producto actualizado correctamente.']);
        } else {
        
            return response()->json(['status' => 'error', 'message' => 'Producto no encontrado.']);
        }

        }else{
            echo json_encode(array( 0=>0 ));
        }
       
    }

    public function eliminarProducto(Request $request){
        $idproducto=$request->post('id');
        $obj=Producto::find($idproducto);
        $obj->prod_estado='ELIMINADO';
        $obj->save();
    }

    public function estadoProducto(Request $request){
        $id=$request->post('id');
        $prod_estado=$request->post('prod_estado');
        if($prod_estado=='ACTIVO'){
            $estado='INACTIVO';
        }else{
            $estado='ACTIVO';
        }
        $obj=Producto::find($id);
        $obj->prod_estado =$estado;
        $obj->save();
    }
   

    public  function reporteExcel(){
        $lis_producto=DB::select("SELECT productos.id as idproducto,productos.*,categorias.*,presentaciones.*,proveedores.*,laboratorios.*  FROM productos
        INNER JOIN categorias ON productos.idcategoria = categorias.id
         INNER JOIN presentaciones ON productos.idpresentacione = presentaciones.id
        INNER JOIN proveedores ON productos.idproveedore = proveedores.id
        INNER JOIN laboratorios ON proveedores.laboratorios_id = laboratorios.id
        WHERE productos.prod_estado!='ELIMINADO' ");
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=reporteHojaRutaExcel.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo "\xEF\xBB\xBF";
        echo '<table class="table">
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

              </tr>
            </thead>
            <tbody>';
            $con=1;
            foreach ($lis_producto as $value2) {
                echo '<tr>
                  <td>'.$con++.'</td>
                  <td>'.$value2->prod_nombre.'</td>
                  <td>'.$value2->prod_cantidad.'</td>
                  <td>'.$value2->prod_precio_compra.'</td>
                  <td>'.$value2->prod_precio_venta.'</td>
                  <td>'.$value2->ca_nombre.'</td>
                  <td>'.$value2->pre_nombre.'</td>
                  <td>'.$value2->la_nombre.'</td>
                  <td>'.$value2->pro_nombre.'</td>
                  <td>'.$value2->pro_email.'</td>
                  <td>'.$value2->pro_telefono.'</td>
                  <td>'.$value2->pro_direccion.'</td>
                 <td>'.$value2->prod_estado.'</td>
                  <td>'.$value2->prod_fecha_reg.'</td>
                  <td>'.$value2->prod_fecha_vencimiento.'</td>
                
        
                </tr>';
            }
            

        echo '</tbody>
          </table>';

    }
    public function reportePDF(){
   
        $lis_producto = DB::select("SELECT productos.id as idproducto, productos.*, categorias.*, presentaciones.*, proveedores.*, laboratorios.* 
                                    FROM productos
                                    INNER JOIN categorias ON productos.idcategoria = categorias.id
                                    INNER JOIN presentaciones ON productos.idpresentacione = presentaciones.id
                                    INNER JOIN proveedores ON productos.idproveedore = proveedores.id
                                    INNER JOIN laboratorios ON proveedores.laboratorios_id = laboratorios.id
                                    WHERE productos.prod_estado != 'ELIMINADO'");
    
        $this->fpdf->AddPage('L', ['216', '279']);
        
  
        $this->fpdf->Image('alert/', 40, 5, 190, 30, 'png');
    
        $this->fpdf->SetFont('Arial', 'B', 25);
        $this->fpdf->SetTextColor(0, 51, 102);
        $this->fpdf->ln(20);  
        $this->fpdf->Cell(250, 10, "REPORTE DE PRODUCTOS", 0, 1, 'C');

        $this->fpdf->ln(2);
        $this->fpdf->SetFont('Arial', 'B', 7);
        $this->fpdf->Cell(10, 6, "#", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "NOMBRE", 1, 0, 'C');
        $this->fpdf->Cell(15, 6, "STOCK", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "PRECIO COMPRA", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "PRECIO VENTA", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "CATEGORIA", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "PRESENTACION", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "LABORATORIO", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "PROVEEDOR", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "EMAIL", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "TELEFONO", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "DIRECCION", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "ESTADO", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "FECHA REG.", 1, 0, 'C');
        $this->fpdf->Cell(20, 6, "FECHA VENC.", 1, 1, 'C');
    
        $con = 1;
        foreach ($lis_producto as $value2) {
            $this->fpdf->SetFont('Arial', '', 6);
            $this->fpdf->Cell(10, 6, $con++, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->prod_nombre, 1, 0, 'C');
            $this->fpdf->Cell(15, 6, $value2->prod_cantidad, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->prod_precio_compra, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->prod_precio_venta, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->ca_nombre, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->pre_nombre, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->la_nombre, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->pro_nombre, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->pro_email, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->pro_telefono, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->pro_direccion, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->prod_estado, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->prod_fecha_reg, 1, 0, 'C');
            $this->fpdf->Cell(20, 6, $value2->prod_fecha_vencimiento, 1, 1, 'C');
        }
    

        $this->fpdf->Output();
        exit;
    }
    

}
