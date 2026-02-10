<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class categoriaController extends Controller
{
    public function tipoCategoria(){

        $lis_categoria=DB::table('categorias')->where('ca_estado','!=','ELIMINADO')->get();

     return view('categoria.tipoCategoria_index', compact('lis_categoria'));

    }
    
    public function nuevoRegistroCategoria(Request $request)
{
    $id=$request->post('id');
        if($id){
            //metodo para modificar
            $obj = Categoria::find($id);
             if ($obj) {
            $obj->ca_nombre = mb_strtoupper($request->post('ca_nombre'), 'utf-8');
            $obj->save();
            return response()->json(['success' => 'Registro actualizado correctamente.']);
        }
        }else{
            //registro nuevo
            $obj=new Categoria();
            $obj->ca_nombre=mb_strtoupper($request->post('ca_nombre'),'utf-8');
            $obj->ca_estado='ACTIVO';
            $obj->ca_fecha_reg=date('Y-m-d');
            $obj->save();
        }
  
}

public function eliminarCategoria(Request $request){
    $id=$request->post('id');
    $obj=Categoria::find($id);
    $obj->ca_estado='ELIMINADO';
    $obj->save();
}

    public function estadoCategoria(Request $request){
        $id=$request->post('id');
        $ca_estado=$request->post('ca_estado');
        if($ca_estado=='ACTIVO'){
            $estado='INACTIVO';
        }else{
            $estado='ACTIVO';
        }
        $obj=Categoria::find($id);
        $obj->ca_estado=$estado;
        $obj->save();
    }

}
