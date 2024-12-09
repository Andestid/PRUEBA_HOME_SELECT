<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reserva';
    protected $primaryKey = 'id_reserva';
    public $timestamps = false;
    protected $fillable = [
        'id_cliente',
        'id_apartamento',
        'fecha_inicio',
        'fecha_fin',
        'costo'
    ];

    /**
     * Relación: Una reserva pertenece a un cliente.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    /**
     * Relación: Una reserva está asociada a un apartamento.
     */
    public function apartamento()
    {
        return $this->belongsTo(Apartamento::class, 'id_apartamento');
    }
}