<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Param_Porc extends Model
{
        protected $table = 'param_porc';
    	protected $fillable = ['nomb_param_porc','observ_param_porc','estado_param_porc','fechaini_param_porc','fechafin_param_porc','id_emp','id_fec'];
}

