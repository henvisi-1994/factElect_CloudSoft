<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'usuario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_usu';

    protected $fillable = [
        'id_rol', 'id_emp', 'id_fec','nomb_usu','clave_usu','observ_usu','estado_usu','email','password','fechaini_usu','fechafin_usu',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'clave_usu', 'remember_token',
    ];
}
