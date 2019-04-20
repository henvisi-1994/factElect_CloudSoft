<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuento';
    protected $fillable = ['nomb_desc','observ_desc','estado_desc','fechaini_desc','fechafin_desc','id_emp','id_fec'];
}
