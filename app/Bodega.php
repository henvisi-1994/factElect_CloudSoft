<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $table = 'bodega';
    protected $fillable = ['nombre_bod','direcc_bod','estado_bod','telef_bod','cel_bod','nomb_contac_bod','fechaini_bod','fechafin_bod','id_ciu','id_pais','id_prov'];
}
