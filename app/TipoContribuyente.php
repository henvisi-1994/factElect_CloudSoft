<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContribuyente extends Model
{
    protected $table = 'tip_contrib';
    protected $fillable = ['nomb_contrib','obser_contrib','estado_contrib','fechaini_contrib','fechafin_contrib'];
}
