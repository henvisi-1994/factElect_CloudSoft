<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $fillable = ['nomb_usu','clave_usu','observ_usu','estado_usu','fechaini_usu','fechafin_usu','id_rol','id_emp','id_fec'];
}
