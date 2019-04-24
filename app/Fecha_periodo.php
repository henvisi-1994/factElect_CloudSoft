<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha_periodo extends Model
{
    protected $table = 'fecha_periodo';
    protected $fillable = ['nomb_fec', 'mesidentif_fec', 'observ_fec', 'estado_fec', 'fechaini_fec', 'fechafin_fec'];
}
