<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';
    protected $fillable = ['id_formapago', 'id_per', 'num_fact', 'fecha_emision_fact', 'hora_emision_fact', 'vencimiento_fact','tipo_fact','observ_fact','total_fact','id_empl'];
}