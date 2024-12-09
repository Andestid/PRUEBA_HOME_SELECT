<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    use HasFactory;

    protected $table = 'apartamento';
    protected $primaryKey = 'id_apartamento';
    public $timestamps = false;
    protected $fillable = ['direccion', 'descripcion', 'id_propietario','costoxdia'];

    /**
     * Relación: Cada Apartamento pertenece a un Propietario
     */
    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'id_propietario');
    }
}