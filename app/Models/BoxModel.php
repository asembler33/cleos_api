<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxModel extends Model{
    
    use HasFactory;

    public $timestamps = false;

    protected $table = 'box';

    protected $fillable = ['id','nombre_box', 'numero_box', 'piso', 'contacto', 'detalle'];
}
