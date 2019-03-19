<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identificaciones extends Model
{
    protected $table = 'identificacion';
    protected $fillable = ['sri_ident','descrip_ident','observ_ident','estado_ident','fechaini_ident','fechafin_ident'];
}