<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuracionModel extends Model{

    use HasFactory;

    protected $table = 'duracion_servicio';

    protected $fillable = ['id', 'duracion_servicio'];
}
