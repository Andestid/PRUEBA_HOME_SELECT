<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encargados extends Model
{
    protected $table = 'encargados';

    protected $primaryKey = 'id_encargado';

    public $timestamps = false; 

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'oficio',
    ];
}