<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesionesModel extends Model{
    use HasFactory;

    protected $table = 'profesiones';

    protected $fillable = ['id', 'profesion'];
}