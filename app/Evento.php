<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Evento extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'eventos';
    protected $fillable = [
        'id_evento','nome','data','hora', 'id_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
