<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Disciplina extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'disciplina';
    protected $fillable = [
        'id_disc','codigo','nome', 'carga_horaria', 'limite_freq','faltas','id_aluno'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
