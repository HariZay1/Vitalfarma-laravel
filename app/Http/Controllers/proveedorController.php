<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Proveedore;
use App\Models\Laboratorio;

class proveedorController extends Controller
{
   
    public function listaProveedor()
    {
        $lis_proveedor = DB::select("SELECT proveedores.id as idproveedores, proveedores.*, laboratorios.* FROM proveedores
        INNER JOIN laboratorios on laboratorios.id = proveedores.laboratorios_id
        WHERE proveedores.pro_estado != 'ELIMINADO'");

        $tipo_l = DB::table('laboratorios')->where('la_estado', '=', 'ACTIVO')->get();

        return view('proveedor.listaProveedor_index', compact('tipo_l', 'lis_proveedor'));
    }

    public function nuevoRegistroProveedor(Request $request)
    {
        $obj = new Proveedore();
        $obj->pro_nombre = mb_strtoupper($request->post('pro_nombre'), 'utf-8');
        $obj->pro_email = $request->post('pro_email');
        $obj->pro_telefono = $request->post('pro_telefono');
        $obj->pro_direccion = $request->post('pro_direccion');
        $obj->pro_estado = 'ACTIVO';
        $obj->laboratorios_id = $request->post('Laboratorio');
        $obj->save();
    }
    public function editarProveedor(Request $request)
    {
        $idProveedor = $request->post('id');
        $obj = DB::table("proveedores")->where('id', '=', $idProveedor)->first();
        $tipo_l=DB::table('laboratorios')->where('la_estado','=','ACTIVO')->get();
    
    
        return view('proveedor.editarProveedor', compact('obj','tipo_l'))->render();
    }
    
    public function editarRegistroProveedor(Request $request){
        $idproveedores=$request->post('idproveedores');
        $obj=Proveedore::find($idproveedores);
        $obj->pro_nombre = mb_strtoupper($request->post('pro_nombre'), 'utf-8');
        $obj->pro_email = $request->post('pro_email');
        $obj->pro_telefono = $request->post('pro_telefono');
        $obj->pro_direccion = $request->post('pro_direccion');
        $obj->laboratorios_id = $request->post('Laboratorio');
        $obj->save();
    }
    public function eliminarProveedor(Request $request){
        $idproveedores=$request->post('id');
        $obj=Proveedore::find($idproveedores);
        $obj->pro_estado='ELIMINADO';
        $obj->save();
    }
    public function estadoProveedor(Request $request){
        $id=$request->post('id');
        $pro_estado=$request->post('pro_estado');
        if($pro_estado=='ACTIVO'){
            $estado='INACTIVO';
        }else{
            $estado='ACTIVO';
        }
        $obj=Proveedore::find($id);
        $obj->pro_estado =$estado;
        $obj->save();
    }


   }