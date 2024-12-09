<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tarea;
use App\Models\pago;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class tareaController extends Controller
{
    public function crear()
    {
        return view('tarea.crear');
    }
    public function guardar(Request $request)
    {
        try {
            // Validar los datos
            $request->validate([
                'id_incidencia' => 'required|int|exists:incidencia,id_incidencia',
                'descripcion' => 'required|string|max:255',
                'id_encargado' => 'required|int|exists:encargados,id_encargado',
                'costo' => 'required|numeric',
            ]);

            DB::beginTransaction();
    
            // Crear la reserva
            $tarea = tarea::create([
                'id_incidencia' => $request->id_incidencia,
                'descripcion' => $request->descripcion,
                'id_encargado' => $request->id_encargado,
                'estado' => "PROGRESO",
                'costo' => $request->costo,
                'responsable' => $request->responsable,
            ]);

            if ($request->responsable === 'propietario') {

                $id_reserva = DB::table('incidencia')
                ->where('id_incidencia', $request->id_incidencia)
                ->value('id_reserva');

                $id_apartamento = DB::table('reserva')
                ->where('id_reserva', $id_reserva)
                ->value('id_apartamento');
                pago::create([
                    'id_reserva'=>$id_reserva,
                    'id_apartamento'=>$id_apartamento,
                    'fecha_pago'=>now(),
                    'monto'=>$request->costo,
                    'id_tarea'=>$tarea->id_tarea,
                ]);
            }

            DB::commit();
            
    
            // Redirigir con mensaje de éxito
            return redirect()->back()->with('success', 'Tarea guardada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al guardar la tarea: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al guardar la tarea.');
        }
    }

    public function leer()
    {
        // Cargar las tareas junto con incidenciao y encargados
        $tarea = tarea::with(['incidencia', 'encargados'])->get();

        // Retornar la vista con los datos de las tareas
        return view('tarea.leer', compact('tarea'));
    }

    public function delete($id_tarea)
    {
        try {
            // Buscar la reserva por su ID
            $tarea = tarea::findOrFail($id_tarea);

            // Eliminar la reserva
            $tarea->delete();

            return redirect()->back()->with('success', 'Tarea eliminada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar la tarea: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar la tarea.');
        }
    }

    public function update(Request $request, $id_tarea)
    {
        try {
            // Validar los datos
            $request->validate([
                'descripcion' => 'required|string|max:255',
                'id_encargado' => 'required|int|exists:encargados,id_encargado',
                'estado' => 'required|string|max:255',
                'costo' => 'required|numeric',
            ]);

            // Buscar la tarea existente
            $tarea = tarea::findOrFail($id_tarea);

            // Actualizar la reserva
            $tarea->update([
                'descripcion' => $request->descripcion,
                'id_encargado' => $request->id_encargado,
                'estado' => $request->estado,
                'costo' => $request->costo,
            ]);

            return redirect()->back()->with('success', 'Tarea actualizada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar la Tarea: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la Tarea.');
        }
    }
}