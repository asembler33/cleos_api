<?php

namespace App\Http\Controllers;

use App\Models\EspecialidadesModel;
use App\Models\ServiciosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $servicios = ServiciosModel::join("especialidades", "servicios.id_especialidad", "=", "especialidades.id")
        ->select("servicios.*", "especialidades.especialidad")
        ->get();
        
        return $servicios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listaServicios(){
        
        $servicios = ServiciosModel::join("especialidades", "servicios.id_especialidad", "=", "especialidades.id")
        ->select("servicios.*", "especialidades.especialidad")
        ->get();


        return response()->json( $servicios);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        ServiciosModel::create([
            "id_especialidad" => $request->input('especialidad'),
            "servicio" => $request->input('nombreServicio'),
            "descripcion" => $request->input('descripcion'),
            "preparacion_previa" => $request->input('preparacionPrevia'),
            "id_duracion" => $request->input('duracion'),
            "precio" => $request->input('precio')
        ]);
        
        return $this->index();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiciosModel  $serviciosModel
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $servicios = ServiciosModel::find($id);
        
        // return response()->json( $response);
        return $servicios;
    }

    public function getServicioPorEspecialidad($id){

        return DB::table('servicios')->where('id_especialidad', $id)->get();

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiciosModel  $serviciosModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $servicio = ServiciosModel::find($id);

        $servicio->id_especialidad = $request->input('especialidad');
        $servicio->servicio = $request->input('nombreServicio');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->preparacion_previa = $request->input('preparacionPrevia');
        $servicio->id_duracion = $request->input('duracion');
        $servicio->precio = $request->input('precio');
        $servicio->save();

        return $this->index();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiciosModel  $serviciosModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        ServiciosModel::find($id)->delete();
    }
}
