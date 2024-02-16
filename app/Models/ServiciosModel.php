<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosModel extends Model{
    // use HasFactory;

    protected $table = 'servicios';

    protected $fillable = ['id_especialidad', 'servicio', 'descripcion', 'preparacion_previa', 'id_duracion', 'precio'];
                          

}
