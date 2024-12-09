<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\incidencia;
use App\Models\reserva;
use Illuminate\Support\Facades\Log;

class IncidenciaController extends Controller
{
    public function crear()
    {
        return view('incidencia.crear');
    }

    public function guardar(Request $request)
    {
        try {
            Log::info('Datos enviados en la solicitud: ', $request->all());
            // Validar los datos
            $request->validate([
                'id_reserva' => 'required|int|exists:reserva,id_reserva',
                'comentario' => 'required|string|max:255',
            ]);
    
            // Crear la incidencia
            incidencia::create([
                'id_reserva' => $request->id_reserva,
                'comentario' => $request->comentario,
                'reporte' => now(),
                'estado' => "ABIERTA",
            ]);
    
            // Redirigir con mensaje de éxito
            return redirect()->back()->with('success', 'Incidencia guardada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al guardar la incidencia: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al guardar la incidencia.');
        }
    }

    public function leer()
    {
        // Cargar las incidencia junto con el reserva
        $incidencia = incidencia::with(['reserva'])->get();

        // Retornar la vista con los datos de las reservas
        return view('incidencia.leer', compact('incidencia'));
    }
    public function update(Request $request, $id_incidencia)
    {
        try {
            // Validar los datos
            $request->validate([
                'estado' => 'required|string|max:255',
                'comentario' => 'required|string|max:255',
            ]);

            $incidencia = incidencia::findOrFail($id_incidencia);

            // Actualizar la incidencia
            $incidencia->update([
                'estado' => $request->estado,
                'comentario' => $request->comentario,
            ]);

            return redirect()->back()->with('success', 'Incidencia actualizada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar la incidencia: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la incidencia.');
        }
    }
    public function delete($id)
    {
        try {
            // Buscar incidencia por su clave primaria
            $incidencia = incidencia::findOrFail($id);

            // Eliminar incidencia
            $incidencia->delete();

            return redirect()->back()->with('success', 'incidencia eliminada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar la incidencia: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar incidencia.');
        }
    }
}