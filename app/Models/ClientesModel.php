<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesModel extends Model{

    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = ['id', 'rut', 'nombres', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'telefono', 'correo'];

}
