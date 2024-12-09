<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pago;
use Illuminate\Support\Facades\Log;

class pagoController extends Controller
{

    public function leer()
    {
        $Pago = pago::with([
            'reserva.apartamento.propietario' => function ($query) {
                $query->select('id_propietario', 'nombre', 'apellido'); // Agregamos 'id' para que la relación funcione correctamente
            }
        ])->get();

        
    
        return view('pago.leer', compact('Pago'));
    }

}