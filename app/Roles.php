<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $fillable = ['id_emp', 'id_fec', 'nomb_rol', 'observ_rol', 'estado_rol', 'fechaini_rol', 'fechafin_rol'];
}
