<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class clienteController extends Controller
{
    

    public function listaCliente(){
        $cliente=DB::table("clientes")->where('cli_estado','!=','ELIMINADO')->get();
   
        return view('listaCliente.listaCliente_index',compact('cliente'));
    }
    public function nuevoRegistroCliente(Request $request){
        $obj=new Cliente();
        $obj->cli_ci=$request->post('ci');
        $obj->cli_expedido=$request->post('expedido');
        $obj->cli_nombre=mb_strtoupper($request->post('nombre'),'utf-8');
        $obj->cli_paterno=mb_strtoupper($request->post('paterno'),'utf-8');
        $obj->cli_materno=mb_strtoupper($request->post('materno'),'utf-8');
        $obj->cli_celular=$request->post('celular');
        $obj->cli_estado='ACTIVO';
        $obj->cli_fecha_reg=date('Y-m-d');
        $obj->save();
    }
    public function editarCliente(Request $request){
        $idcliente=$request->post('id');
        $obj=DB::table("clientes")->where('id','=',$idcliente)->first();

        return view('listaCliente.editarCliente',compact('obj'));
    }
    public function editarRegistroCliente(Request $request){
        $idcliente=$request->post('idcliente');
        $obj=Cliente::find($idcliente);
        $obj->cli_ci=$request->post('ci');
        $obj->cli_expedido=$request->post('expedido');
        $obj->cli_nombre=mb_strtoupper($request->post('nombre'),'utf-8');
        $obj->cli_paterno=mb_strtoupper($request->post('paterno'),'utf-8');
        $obj->cli_materno=mb_strtoupper($request->post('materno'),'utf-8');
        $obj->cli_celular=$request->post('celular');
        $obj->save();
    }
    public function eliminarCliente(Request $request){
        $idcliente=$request->post('id');
        $obj=Cliente::find($idcliente);
        $obj->cli_estado='ELIMINADO';
        $obj->save();
    }
    public function estadoCambiar(Request $request){
        $id=$request->post('id');
        $tipo_estado=$request->post('tipo_estado');
        if($tipo_estado=='ACTIVO'){
            $estado='INACTIVO';
        }else{
            $estado='ACTIVO';
        }
        $obj=Cliente::find($id);
        $obj->cli_estado =$estado;
        $obj->save();
    }




    }