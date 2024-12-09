<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propietario extends Model
{
    use HasFactory;

    protected $table = 'propietario';
    protected $primaryKey = 'id_propietario';
    protected $fillable = ['nombre', 'apellido', 'email'];
    public $timestamps = false;
}
