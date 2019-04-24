<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_docum';
    protected $fillable = ['id_emp', 'id_fec', 'nomb_doc', 'observ_doc', 'estado_doc', 'fechaini_doc','fechafin_doc'];
}
