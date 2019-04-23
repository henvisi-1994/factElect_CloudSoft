<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Param_Docs extends Model
{
    protected $table = 'param_docs';
    protected $fillable = ['nomb_param_docs','observ_param_docs','estado_param_docs','fechaini_param_docs','fechafin_param_docs','id_emp','id_fec'];
}
