@extends('layouts.app')
@section('content')
<h1>Incidencias</h1> 
  <!-- Botón para regresar a la página de crear incidencia -->
  <div class="mb-3">
    <a href="{{ route('incidencia.crear') }}" class="btn btn-success">Crear Nueva incidencia</a>
  </div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID reserva</th>
            <th scope="col">reporte</th>
            <th scope="col">estado</th>
            <th scope="col">comentario</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($incidencia as $incidencias)
        <tr>
            <td>{{ $incidencias->id_incidencia }}</td>
            <td>{{ $incidencias->reserva->id_reserva }}</td>
            <td>{{ $incidencias->reporte }}</td>
            <td>{{ $incidencias->estado }}</td>
            <td>{{ $incidencias->comentario }}</td>
            <td>
            <button 
                class="btn btn-warning btn-sm" 
                data-bs-toggle="modal" 
                data-bs-target="#modal{{$incidencias->id_incidencia}}"
                >Editar</button>
                @include('incidencia.actualizar')
                <form action="{{ route('incidencia.delete', $incidencias->id_incidencia) }}" method="POST" style="display:inline-block;">
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