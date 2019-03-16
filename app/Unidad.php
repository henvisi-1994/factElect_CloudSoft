<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidad';
    protected $fillable = ['nomb_unidad','observ_unidad','estado_unidad','fechaini_unidad','fechafin_unidad','control_fecha'];
}
