<?php

namespace App\Http\Controllers;

use App\Models\EspecialidadesModel;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){

        return $especialidades = EspecialidadesModel::all();
    }

    public function listaEspecialidades(){
        // return response()->json( $especialidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $especialidades = new EspecialidadesModel();
        $especialidades->especialidad = $request->json()->get("especialidad");
        $especialidades->save();

        return $especialidades = EspecialidadesModel::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EspecialidadesModel  $especialidadesModel
     * @return \Illuminate\Http\Response
     */
    public function show($especialidad){
        
        return EspecialidadesModel::find($especialidad);

    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EspecialidadesModel  $especialidadesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $especialidad = EspecialidadesModel::find($id);
        $especialidad->especialidad = $request->json()->get("especialidad");
        $especialidad->save();

        return $especialidades = EspecialidadesModel::all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EspecialidadesModel  $especialidadesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $especialidad = EspecialidadesModel::find($id);
        $especialidad->delete();
    }
}
