<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajadoresModel extends Model{

    use HasFactory;

    protected $table = 'trabajadores';

    protected $fillable = ['id', 'id_user', 'id_rol', 'id_profesion', 'rut', 'nombres', 'apellido_materno', 'apellido_paterno', 'direccion', 'correo', 'prestador_servicio', 'imagen_trabajador', 'imagen_firma'];

}
