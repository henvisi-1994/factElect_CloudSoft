<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
     protected $fillable = ['id_emp','id_fec','nomb_cat','observ_cat','estado_cat','fechaini_cat','fechafin_cat','control_fecha'];
}
