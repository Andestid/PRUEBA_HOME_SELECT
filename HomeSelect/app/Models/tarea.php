<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'tarea';

    // Claves primarias
    protected $primaryKey = 'id_tarea';

    public $timestamps = false;

    // Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'id_incidencia',
        'descripcion',
        'id_encargado',
        'estado',
        'costo',
        'responsable',
    ];

    /**
     * Relación con la tabla Incidencia.
     * id_incidencia es una clave foránea que hace referencia a la tabla 'incidencia'.
     */
    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class, 'id_incidencia');
    }

    /**
     * id_encargado es una clave foránea que hace referencia a la tabla 'encargado'.
     */
    public function encargados()
    {
        return $this->belongsTo(Encargados::class, 'id_encargado');
    }
}