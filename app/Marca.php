<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marca';
    protected $fillable = ['nomb_marca','observ_marca','estado_marca','fechaini_marca','fechafin_marca','control_fecha'];
}
