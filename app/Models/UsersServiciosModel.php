<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersServiciosModel extends Model{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'rel_users_servicios';

    protected $fillable = ['id','id_user', 'id_servicio'];

}
