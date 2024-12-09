<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartamento;
use Illuminate\Support\Facades\Log;

class ApartamentoController extends Controller
{
    public function crear()
    {
        return view('apartamento.crear');
    }

    public function leer()
    {
        $apartamento = Apartamento::with('propietario')->get();
        return view('apartamento.leer', compact('apartamento'));
    }

    public function delete($id)
    {
        try {
            // Buscar el apartamento por su clave primaria
            $apartamento = apartamento::findOrFail($id);

            // Eliminar el apartamento
            $apartamento->delete();

            return redirect()->back()->with('success', 'apartamento eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar apartamento: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar el apartamento.');
        }
    }

    public function update(Request $request, $id_apartamento)
    {
        try {
            // Buscar el apartamento por su clave primaria en la base de datos
            $apartamento = apartamento::findOrFail($id_apartamento);
    
            // Validar los datos
            $request->validate([
                'direccion' => 'required|string|max:255',
                'descripcion' => 'required|string|max:255',
                'costoxdia' => 'required|numeric',
            ]);
    
            // Actualizar apartamento
            $apartamento->direccion = $request->input('direccion');
            $apartamento->descripcion = $request->input('descripcion');
            $apartamento->costoxdia = $request->input('costoxdia');
            $apartamento->save();
    
            return redirect()->back()->with('success', 'apartamento actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar apartamento: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el apartamento.');
        }
    }
    
    public function guardar(Request $request)
    {
        try {
            // Validar los datos
            $request->validate([
                'direccion' => 'required|string|max:255',
                'descripcion' => 'required|string|max:255',
                'id_propietario' => 'required|int|exists:propietario,id_propietario',
                'costoxdia' => 'required|numeric',
            ]);
    
            // Crear el apartamento
            apartamento::create([
                'direccion' => $request->direccion,
                'descripcion' => $request->descripcion,
                'id_propietario' => $request->id_propietario,
                'costoxdia' => $request->costoxdia,
            ]);
    
            // Redirigir con mensaje de éxito
            return redirect()->back()->with('success', 'apartamento guardado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al guardar apartamento: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al guardar el apartamento.');
        }
    }
}