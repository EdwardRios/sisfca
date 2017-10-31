<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;


class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable,DatesTranslator;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //establecemos las relaciones con el modelo Role, ya que un usuario puede tener varios roles
    //y un rol lo pueden tener varios usuarios
}
