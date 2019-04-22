<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
     protected $table = 'codformulario';
       protected $fillable = ['id_padcodform', 'id_emp', 'id_fec', 'nomb_codform', 'observ_codform', 'estado_codform', 'fechaini_codform', 'fechafin_codform'];
}

