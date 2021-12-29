<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $fillable = ['id_usu','id_bod','id_emp','id_fec','descripcion_inv','fecha_inv','numprod_inv','numexist_inv','capneto_inv','cappvp_inv','util_inv','observ_inv','estado_inv','fechaini_inv','fechafin_inv','control_fecha'];
}