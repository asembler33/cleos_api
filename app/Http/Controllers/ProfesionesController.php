<?php

namespace App\Http\Controllers;

use App\Models\ProfesionesModel;
use Illuminate\Http\Request;

class ProfesionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
        return ProfesionesModel::all();
    }

    public function store(Request $request){
        
        $profesionCampo = new ProfesionesModel();
        $profesionCampo->profesion = $request->json()->get("profesion");
        $profesionCampo->save();

        return $profesionCampo = ProfesionesModel::all();

    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        
        return ProfesionesModel::find($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        
        $profesionCampo = ProfesionesModel::find($id);
        $profesionCampo->profesion = $request->json()->get("profesion");
        $profesionCampo->save();

        return $profesionCampo = ProfesionesModel::all();

    }

    public function destroy($id){
        ProfesionesModel::find($id)->delete();
    }
}
