<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';
    protected $fillable = ['nomb_ciu','estado_ciu','fechaini_ciu','fechafin_ciu','observ_ciu','id_emp','id_fec'];
}
