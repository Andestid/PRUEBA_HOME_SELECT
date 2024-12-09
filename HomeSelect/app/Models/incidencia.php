<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incidencia extends Model
{
    use HasFactory;

    protected $table = 'incidencia';
    protected $primaryKey = 'id_incidencia';
    public $timestamps = false;
    protected $fillable = [
        'id_reserva',
        'reporte',
        'estado',
        'comentario'
    ];

    /**
     * Relación: Una incidencia pertenece a una reserva.
     */
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }
}