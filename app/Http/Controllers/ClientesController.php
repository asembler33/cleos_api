<?php

namespace App\Http\Controllers;

use App\Models\ClientesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller{

    public function index(){
        
        $arregloClientes = DB::select("SELECT id, rut, CONCAT_WS(' ', nombres, apellido_paterno, apellido_materno) AS nombre_completo, YEAR(CURDATE()) - YEAR(fecha_nacimiento) AS edad, telefono, correo FROM clientes");
        
        return $arregloClientes;
    }

    public function store(Request $request){
        
        
        ClientesModel::create([
            "rut" => $request->json()->get('rut'),
            "nombres" => $request->json()->get('nombres'),
            "apellido_paterno" => $request->json()->get('paterno'),
            "apellido_materno" => $request->json()->get('materno'),
            "fecha_nacimiento" => $request->json()->get('fecha_nacimiento'),
            "direccion" => $request->json()->get('direccion'),
            "telefono" => $request->json()->get('telefono'),
            "correo" => $request->json()->get('correo')
        ]);

        return ClientesModel::all();

    }

    /**
     * Display the specified resource.
     */
    public function show($id){

        return ClientesModel::find($id);
    }

    public function update(Request $request, $id){

        $clientes = ClientesModel::find($id);
        $clientes->rut = $request->json()->get('rut');
        $clientes->nombres = $request->json()->get('nombres');
        $clientes->apellido_paterno = $request->json()->get('paterno');
        $clientes->apellido_materno = $request->json()->get('materno');
        $clientes->fecha_nacimiento = $request->json()->get('fecha_nacimiento');
        $clientes->direccion = $request->json()->get('direccion');
        $clientes->telefono = $request->json()->get('telefono');
        $clientes->correo = $request->json()->get('correo');
        $clientes->save();

        return ClientesModel::all();
        
    }
   
    public function destroy($id){
        ClientesModel::find($id)->delete();
    }
}
