<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\propietario;
use Illuminate\Support\Facades\Log;

class PropietarioController extends Controller
{
    public function crear()
    {
        return view('propietario.crear');
    }

    public function leer()
    {
        $propietario = propietario::all();
        return view('propietario.leer', compact('propietario'));
    }

    public function delete($id)
    {
        try {
            // Buscar el propietario por su clave primaria
            $propietario = propietario::findOrFail($id);

            // Eliminar el propietario
            $propietario->delete();

            return redirect()->back()->with('success', 'propietario eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar propietario: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar el propietario.');
        }
    }

    public function update(Request $request, $id_propietario)
    {
        try {
            // Buscar el propietario por su clave primaria en la base de datos
            $propietario = propietario::findOrFail($propietario);
    
            // Validar los datos
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:propietario,email,' . $propietario->id_propietario . ',id_propietario',
            ]);
    
            // Actualizar propietario
            $propietario->nombre = $request->input('nombre');
            $propietario->apellido = $request->input('apellido');
            $propietario->email = $request->input('email');
            $propietario->save();
    
            return redirect()->back()->with('success', 'propietario actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar propietario: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el propietario.');
        }
    }
    
    public function guardar(Request $request)
    {
        try {
            // Validar los datos
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:propietario,email',
            ]);
    
            // Crear el propietario
            propietario::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
            ]);
    
            // Redirigir con mensaje de éxito
            return redirect()->back()->with('success', 'propietario guardado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al guardar propietario: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al guardar el propietario.');
        }
    }
}