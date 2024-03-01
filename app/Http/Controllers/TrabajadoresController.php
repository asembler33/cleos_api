<?php

namespace App\Http\Controllers;

use App\Models\TrabajadoresModel;
use Illuminate\Http\Request;

class TrabajadoresController extends Controller{
    
    public function index(){
        
        return TrabajadoresModel::all();
    }

    
    public function store(Request $request){

        $trabajador = TrabajadoresModel::create([
            "id_user" => $request->json()->get('id'),
            "id_rol" => $request->json()->get('idRol'),
            "id_profesion" => $request->json()->get('idProfesion'),
            "rut" => $request->json()->get('rut'),
            "nombres" => $request->json()->get('nombres'),
            "apellido_materno" => $request->json()->get('apellidoMaterno'),
            "apellido_paterno" => $request->json()->get('apellidoPaterno'),
            "direccion" => $request->json()->get('direccion'),
            "correo" => $request->json()->get('correo'),
            "prestador_servicio" => $request->json()->get('prestadorServicio')

        ]);

        return $this->index();
        
    }

    
    public function show($idTrabajador){
        
        return TrabajadoresModel::find($idTrabajador);
    }


    public function update(Request $request, $idTrabajador){

        $trabajador = TrabajadoresModel::find($idTrabajador);
        $trabajador->id_user =  $request->json()->get('id');
        $trabajador->id_rol = $request->json()->get('idRol');
        $trabajador->id_profesion = $request->json()->get('idProfesion');
        $trabajador->rut = $request->json()->get('rut');
        $trabajador->nombres = $request->json()->get('nombres');
        $trabajador->apellido_materno = $request->json()->get('apellidoMaterno');
        $trabajador->apellido_paterno = $request->json()->get('apellidoPaterno');
        $trabajador->direccion = $request->json()->get('direccion');
        $trabajador->correo = $request->json()->get('correo');
        $trabajador->prestador_servicio = $request->json()->get('prestadorServicio');
        $trabajador->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idTrabajador){
        TrabajadoresModel::find($idTrabajador)->delete();
    }
}

