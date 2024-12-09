<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reserva;
use App\Models\cliente;
use App\Models\apartamento;
use Illuminate\Support\Facades\Log;

class ReservaController extends Controller
{
    public function crear()
    {
        return view('reserva.crear');
    }
    
    public function guardar(Request $request)
    {
        try {
            // Validar los datos
            $request->validate([
                'id_cliente' => 'required|int|exists:cliente,id_cliente',
                'id_apartamento' => 'required|int|exists:apartamento,id_apartamento',
                'fecha_inicio' => 'required|date|after_or_equal:today',
                'fecha_fin' => 'required|date|after:fecha_inicio',
            ]);

            // Validar que no haya otra reserva en las mismas fechas
            $conflicto = reserva::where('id_apartamento', $request->id_apartamento)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('fecha_inicio', [$request->fecha_inicio, $request->fecha_fin])
                        ->orWhereBetween('fecha_fin', [$request->fecha_inicio, $request->fecha_fin])
                        ->orWhere(function ($subQuery) use ($request) {
                            $subQuery->where('fecha_inicio', '<=', $request->fecha_inicio)
                                    ->where('fecha_fin', '>=', $request->fecha_fin);
                        });
                })->exists();

            if ($conflicto) {
                return redirect()->back()->with('error', 'El apartamento ya está reservado en las fechas seleccionadas.');
            }

            //Calculo del apartamento por los dias que se estara
            $apartamento = Apartamento::findOrFail($request->id_apartamento);
            $dias = \Carbon\Carbon::parse($request->fecha_inicio)
                        ->diffInDays(\Carbon\Carbon::parse($request->fecha_fin));
            $costoTotal = $dias * $apartamento->costoxdia;
    
            // Crear la reserva
            reserva::create([
                'id_cliente' => $request->id_cliente,
                'id_apartamento' => $request->id_apartamento,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'costo' => $costoTotal,
            ]);
    
            // Redirigir con mensaje de éxito
            return redirect()->back()->with('success', 'Reserva guardada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al guardar la reserva: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al guardar la reserva.');
        }
    }

    public function leer()
    {
        // Cargar las reservas junto con el apartamento y el usuario
        $reserva = reserva::with(['apartamento', 'cliente'])->get();

        // Retornar la vista con los datos de las reservas
        return view('reserva.leer', compact('reserva'));
    }

    public function update(Request $request, $id_reserva)
    {
        try {
            // Validar los datos
            $request->validate([
                'id_cliente' => 'required|int|exists:cliente,id_cliente',
                'id_apartamento' => 'required|int|exists:apartamento,id_apartamento',
                'fecha_inicio' => 'required|date|after_or_equal:today',
                'fecha_fin' => 'required|date|after:fecha_inicio',
            ]);

            // Buscar la reserva existente
            $reserva = reserva::findOrFail($id_reserva);

            // Validar que no haya otra reserva en conflicto
            $conflicto = reserva::where('id_apartamento', $request->id_apartamento)
                ->where('id_reserva', '!=', $id_reserva) // Excluir la reserva actual
                ->where(function ($query) use ($request) {
                    $query->whereBetween('fecha_inicio', [$request->fecha_inicio, $request->fecha_fin])
                        ->orWhereBetween('fecha_fin', [$request->fecha_inicio, $request->fecha_fin])
                        ->orWhere(function ($subQuery) use ($request) {
                            $subQuery->where('fecha_inicio', '<=', $request->fecha_inicio)
                                    ->where('fecha_fin', '>=', $request->fecha_fin);
                        });
                })->exists();

            if ($conflicto) {
                return redirect()->back()->with('error', 'El apartamento ya está reservado en las fechas seleccionadas.');
            }

            // Calcular el costo total
            $apartamento = Apartamento::findOrFail($request->id_apartamento);
            $dias = \Carbon\Carbon::parse($request->fecha_inicio)
                        ->diffInDays(\Carbon\Carbon::parse($request->fecha_fin));
            $costoTotal = $dias * $apartamento->costoxdia;

            // Actualizar la reserva
            $reserva->update([
                'id_cliente' => $request->id_cliente,
                'id_apartamento' => $request->id_apartamento,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'costo' => $costoTotal,
            ]);

            return redirect()->back()->with('success', 'Reserva actualizada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar la reserva: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la reserva.');
        }
    }
    public function delete($id_reserva)
    {
        try {
            // Buscar la reserva por su ID
            $reserva = reserva::findOrFail($id_reserva);

            // Eliminar la reserva
            $reserva->delete();

            return redirect()->back()->with('success', 'Reserva eliminada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar la reserva: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar la reserva.');
        }
    }
}