<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
     protected $fillable = ['id_emp' ,'id_fec','codigo_prod','codbarra_prod' , 
  'descripcion_prod','id_marca','present_prod','precio_prod',
  'ubicacion_prod','stockmin_prod','stockmax_prod','fechaing_prod','fechaelab_prod','fechacad_prod','aplicaiva_prod','aplicaice_prod','util_prod','comision_prod','imagen_prod','observ_prod','estado_prod','fechaini_prod','fechafin_prod'];
}
