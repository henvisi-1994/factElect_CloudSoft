<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
   protected $table = 'empresa';
   protected $fillable = ['id_ciu', 'totestab_emp', 'rucempresa_emp', 'razon_emp', 'nombre_emp', 'apellido_emp', 'contacto_emp', 'direcc_emp', 'telefono_emp', 'celular_emp', 'fax_emp', 'email_emp', 'estado_emp', 'contador_emp', 'tipcontrib_emp', 'fechaini_emp', 'fechafin_emp'];
}
