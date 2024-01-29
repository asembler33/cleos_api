<?php

namespace App\Http\Controllers;

use App\Models\RolesModel;
use Illuminate\Http\Request;

class RolesController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
        return RolesModel::all();
        
    }

    public function store(Request $request){

        
        RolesModel::create([
            "nombre_rol" => $request->json()->get('rol')
        ]);

        return RolesModel::all();
    }

    public function show($id){
        
        return RolesModel::find($id);

    }

    public function update(Request $request, $id){
        
        $roles = RolesModel::find($id);
        $roles->nombre_rol = $request->json()->get('rol');
        $roles->save();

        return RolesModel::all();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        RolesModel::find($id)->delete();
    }
}
