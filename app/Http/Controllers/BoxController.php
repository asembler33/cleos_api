<?php

namespace App\Http\Controllers;
use App\Models\BoxModel as BoxModel;
use App\Models\BoxSucursalesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoxController extends Controller{

    public function index($id) {

        return DB::select("SELECT sl.id AS idSucursalOrigen, bx.id, bx.nombre_box, bx.numero_box, bx.piso, bx.contacto, bx.detalle 
        FROM box bx
        INNER JOIN sucursales_box sb 
        ON bx.id = sb.id_box INNER JOIN sucursales sl ON sl.id = sb.id_sucursal
        WHERE sb.id_sucursal = $id;");

    }
    
    public function store(Request $request){

        $box = BoxModel::create([
            "nombre_box" => $request->json()->get("nombreBox"),  
            "numero_box" => $request->json()->get("numeroBox"),
            "piso" => $request->json()->get("piso"), 
            "contacto" => $request->json()->get("contacto"), 
            "detalle" => $request->json()->get("detalle")
        ]);

        
        BoxSucursalesModel::create([
           "id_sucursal" =>  $request->json()->get('idSucursalOrigen'),
           "id_box" =>  $box->id,
        ]);

        return $this->index($request->json()->get('idSucursalOrigen'));

    }

    public function show($id){

        return BoxModel::find($id);
    }

    public function update(Request $request, $id){

        BoxModel::where("id", $id)->update([
            "nombre_box" => $request->json()->get("nombreBox"),  
            "numero_box" => $request->json()->get("numeroBox"),
            "piso" => $request->json()->get("piso"), 
            "contacto" => $request->json()->get("contacto"), 
            "detalle" => $request->json()->get("detalle")
        ]);

        return $this->index($request->json()->get('idSucursalOrigen'));

    }

    public function destroy($id){
        BoxModel::find($id)->delete();
        BoxSucursalesModel::where('id_box', $id)->delete();
    }

    
}
