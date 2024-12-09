@extends('layouts.app')
@section('content')
<h1>Reservas</h1> 
  <!-- Botón para regresar a la página de crear reservas -->
  <div class="mb-3">
    <a href="{{ route('reserva.crear') }}" class="btn btn-success">Crear una reserva</a>
  </div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre cliente</th>
            <th scope="col">Descripcion apartamento</th>
            <th scope="col">Fecha inicio reserva</th>
            <th scope="col">Fecha fin reserva</th>
            <th scope="col">Costo reserva</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reserva as $reservas)
        <tr>
            <td>{{ $reservas->id_reserva }}</td>
            <td>{{ $reservas->cliente->nombre }} {{ $reservas->cliente->apellido }}</td>
            <td>{{ $reservas->apartamento->descripcion }}</td>
            <td>{{ $reservas->fecha_inicio }}</td>
            <td>{{ $reservas->fecha_fin }}</td>
            <td>{{ $reservas->costo }}</td>
            <td>
            <button 
                    class="btn btn-warning btn-sm" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modal{{$reservas->id_reserva}}"
                >Editar</button>
                @include('reserva.actualizar')
                <form action="{{ route('reserva.delete', $reservas->id_reserva) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este apartamento?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@if (session('success'))
      <div class="alert alert-success" role="aler">
        {{session('success')}}
      </div>
      @elseif (session('error'))
      <div class="alert alert-warning" role="aler">
        {{session('error')}}
      </div>
      @endif
@endsection