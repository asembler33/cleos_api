<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegionModel;

class RegionController extends Controller{
    
    public function index() {

        return RegionModel::all();

    }


}
