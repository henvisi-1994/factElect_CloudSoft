<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
     protected $table = 'empleado';
     protected $fillable = ['id_emp','id_usu','id_per','estado_empl'];
    //
}
