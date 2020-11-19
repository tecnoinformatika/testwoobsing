<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $fillable = ['nombre', 'apellido', 'telefono','email','direccion'];
}
