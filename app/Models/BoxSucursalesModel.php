<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxSucursalesModel extends Model{

    use HasFactory;

    public $timestamps = false;

    protected $table = 'sucursales_box';

    protected $fillable = ['id','id_sucursal', 'id_box'];

}
