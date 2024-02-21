<?php

namespace App\Http\Controllers;

use App\Models\ComunasModel;
use App\Models\SucursalesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SucursalesController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        
        $sucursales = SucursalesModel::join("comunas", "sucursales.comuna_id", "=", "comunas.id")
        ->join("region", "sucursales.id_region", "=", "region.id")
        ->select("sucursales.*", "comunas.comuna", "region.region")
        ->get();
        
        return $sucursales;

    }


    public function listaSucursales(){
        
        $sucursales = SucursalesModel::join("comunas", "sucursales.comuna_id", "=", "comunas.comuna_id")
        ->join("region", "sucursales.id_region", "=", "region.id")
        ->select("sucursales.*", "comunas.comuna_nombre", "region.region AS nombre_region")
        ->get();


        return response()->json( $sucursales);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $sucursales = new SucursalesModel();
        $sucursales->comuna_id = $request->json()->get('comuna');
        $sucursales->id_region = $request->json()->get('regionesRows');
        $sucursales->nombre_sucursal = $request->json()->get('sucursal');
        $sucursales->telefono = $request->json()->get('telefono');
        $sucursales->direccion = $request->json()->get('direccion');
        $sucursales->correo = $request->json()->get('correo');
        $sucursales->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SucursalesModel  $sucursalesModel
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        return SucursalesModel::find($id);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SucursalesModel  $sucursalesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $sucursales = SucursalesModel::find($id);
        $sucursales->id_region = $request->json()->get('regionesRows');
        $sucursales->comuna_id = $request->json()->get('comuna');
        $sucursales->nombre_sucursal = $request->json()->get('sucursal');        
        $sucursales->telefono = $request->json()->get('telefono');
        $sucursales->direccion = $request->json()->get('direccion');
        $sucursales->correo = $request->json()->get('correo');
        $sucursales->save();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SucursalesModel  $sucursalesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        if ( $this->verificarExitenciaBox($id) == 0 ){

            SucursalesModel::find($id)->delete();
        }else{

            return 1;
        }
    }

    public function verificarExitenciaBox($idSucursal){

        $resultadoFilas = DB::select("SELECT sb.id_box FROM sucursales_box sb 
        WHERE sb.id_sucursal = $idSucursal;");

        return count($resultadoFilas);

    }

}
