<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DuracionModel;

class DuracionController extends Controller{
    

    public function index(){
        
        return DuracionModel::all();
    }


}
