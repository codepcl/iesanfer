<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model 
{

    protected $table = 'asistencia';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alumno', 'usuario', 'entrada', 'estado'
    ];
}
