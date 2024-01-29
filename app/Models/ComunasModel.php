<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class ComunasModel extends Model{
    // use HasFactory;

    protected $table = 'comunas';

    protected $fillable = ['id','comuna', 'id_region'];


}