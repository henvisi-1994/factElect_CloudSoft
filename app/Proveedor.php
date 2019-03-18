<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
     protected $table = 'proveedor';
     protected $fillable = ['id_emp','id_fec','cod_prov','id_per','obser_prov','estado_prov','fechaini_prov','fechafin_prov'];
}
