<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = ['cod_cli','observ_cli','estado_cli','fechaini_cli','fechafin_cli','id_emp','id_fec','id_per'];
}
