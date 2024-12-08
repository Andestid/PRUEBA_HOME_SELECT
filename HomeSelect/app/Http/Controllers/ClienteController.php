<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function crear()
    {
        return view('cliente.crear');
    }

    public function leer()
    {
        $cliente = cliente::all();
        return view('cliente.leer', compact('cliente'));
    }

    public function delete($id)
    {
        try {
            // Buscar el cliente por su clave primaria
            $cliente = Cliente::findOrFail($id);

            // Eliminar el cliente
            $cliente->delete();

            return redirect()->back()->with('success', 'Cliente eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar cliente: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar el cliente.');
        }
    }

    public function update(Request $request, $id_cliente)
    {
        try {
            // Buscar el cliente por su clave primaria en la base de datos
            $cliente = Cliente::findOrFail($id_cliente);
    
            // Validar los datos
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:cliente,email,' . $cliente->id_cliente . ',id_cliente',
            ]);
    
            // Actualizar cliente
            $cliente->nombre = $request->input('nombre');
            $cliente->apellido = $request->input('apellido');
            $cliente->email = $request->input('email');
            $cliente->save();
    
            return redirect()->back()->with('success', 'Cliente actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar cliente: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el cliente.');
        }
    }
    
    public function guardar(Request $request)
    {
        try {
            // Validar los datos
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:cliente,email',
            ]);
    
            // Crear el cliente
            Cliente::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
            ]);
    
            // Redirigir con mensaje de éxito
            return redirect()->back()->with('success', 'Cliente guardado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al guardar cliente: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al guardar el cliente.');
        }
    }
}