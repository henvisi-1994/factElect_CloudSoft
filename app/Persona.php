<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
     protected $table = 'persona';
    protected $fillable = ['id_contrib','id_ident','id_ciu','doc_per','organiz_per','nombre_per','apel_per','direc_per','fono1_per','fono2_per','cel1_per','cel2_per','fecnac_per','correo_per','estado_per','fechaini_per','fechafin_per'];
}
