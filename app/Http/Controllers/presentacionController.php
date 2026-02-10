<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Presentacione;
use Illuminate\Support\Facades\DB;

class presentacionController extends Controller
{
    public function tipoPresentacion(){

        $lis_presentacion=DB::table('presentaciones')->where('pre_estado','!=','ELIMINADO')->get();

     return view('presentacione.tipoPresentacion_index', compact('lis_presentacion'));

    }
    
    public function nuevoRegistroPresentacion(Request $request)
{
    $id=$request->post('id');
        if($id){
            //metodo para modificar
            $obj = Presentacione::find($id);
             if ($obj) {
            $obj->pre_nombre = mb_strtoupper($request->post('pre_nombre'), 'utf-8');
            $obj->save();
            return response()->json(['success' => 'Registro actualizado correctamente.']);
        }
        }else{
            //registro nuevo
            $obj=new Presentacione();
            $obj->pre_nombre=mb_strtoupper($request->post('pre_nombre'),'utf-8');
            $obj->pre_estado='ACTIVO';
            $obj->pre_fecha_reg=date('Y-m-d');
            $obj->save();
        }
  
}

public function eliminarPresentacion(Request $request){
    $id=$request->post('id');
    $obj=Presentacione::find($id);
    $obj->pre_estado='ELIMINADO';
    $obj->save();
}

    public function estadoPresentacion(Request $request){
        $id=$request->post('id');
        $pre_estado=$request->post('pre_estado');
        if($pre_estado=='ACTIVO'){
            $estado='INACTIVO';
        }else{
            $estado='ACTIVO';
        }
        $obj=Presentacione::find($id);
        $obj->pre_estado=$estado;
        $obj->save();
    }


}
