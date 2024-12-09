<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    // Nombre de la tabla personalizada
    protected $table = 'pago';

    public $timestamps = false;

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'id_reserva',
        'id_apartamento',
        'fecha_pago',
        'monto',
        'id_tarea',
    ];

    // Definir relaciones (ajustar nombres de tablas si es necesario)

    /**
     * Relación con la tabla de reservas
     */
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }

    /**
     * Relación con la tabla de apartamentos
     */
    public function apartamento()
    {
        return $this->belongsTo(Apartamento::class, 'id_apartamento');
    }

    /**
     * Relación con la tabla de tareas
     */
    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'id_tarea');
    }
}