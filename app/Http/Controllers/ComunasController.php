<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComunasModel;

class ComunasController extends Controller{
    
    public function show($id){
        
        return ComunasModel::where('id_region', $id)->orderBy('comuna', 'asc')->get();

    }

}
