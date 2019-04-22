<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
       protected $table = 'formapago';
       protected $fillable = ['id_formapago', 'id_emp', 'id_fec', 'nomb_formapago', 'observ_formapago', 'estado_formapago', 'fechaini_formapago', 'fechafin_formapago'];
}
