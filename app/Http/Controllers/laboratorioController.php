<?php

namespace App\Http\Controllers;
use App\Models\Laboratorio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class laboratorioController extends Controller
{
    public function tipoLaboratorio(){

        $lis_laboratorio=DB::table('laboratorios')->where('la_estado','!=','ELIMINADO')->get();

     return view('laboratorio.tipoLaboratorio_index', compact('lis_laboratorio'));

    }
    
    public function nuevoRegistroLaboratorio(Request $request)
{
    $id=$request->post('id');
        if($id){
            //metodo para modificar
            $obj = Laboratorio::find($id);
             if ($obj) {
            $obj->la_nombre = mb_strtoupper($request->post('la_nombre'), 'utf-8');
            $obj->save();
            return response()->json(['success' => 'Registro actualizado correctamente.']);
        }
        }else{
            //registro nuevo
            $obj=new Laboratorio();
            $obj->la_nombre=mb_strtoupper($request->post('la_nombre'),'utf-8');
            $obj->la_estado='ACTIVO';
            $obj->la_fecha_reg=date('Y-m-d');
            $obj->save();
        }
  
}

public function eliminarLaboratorio(Request $request){
    $id=$request->post('id');
    $obj=Laboratorio::find($id);
    $obj->la_estado='ELIMINADO';
    $obj->save();
}

    public function estadoLaboratorio(Request $request){
        $id=$request->post('id');
        $la_estado=$request->post('la_estado');
        if($la_estado=='ACTIVO'){
            $estado='INACTIVO';
        }else{
            $estado='ACTIVO';
        }
        $obj=Laboratorio::find($id);
        $obj->la_estado=$estado;
        $obj->save();
    }

}
