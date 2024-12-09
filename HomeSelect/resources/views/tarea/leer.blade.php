@extends('layouts.app')
@section('content')
<h1>Tareas</h1> 
  <!-- Botón para regresar a la página de crear tarea -->
  <div class="mb-3">
    <a href="{{ route('tarea.crear') }}" class="btn btn-success">Crear una tarea</a>
  </div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID incidencia</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Encargado</th>
            <th scope="col">Estado</th>
            <th scope="col">Costo</th>
            <th scope="col">responsable</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tarea as $tareas)
        <tr>
            <td>{{ $tareas->id_tarea }}</td>
            <td>{{ $tareas->incidencia->id_incidencia }}</td>
            <td>{{ $tareas->descripcion }}</td>
            <td>{{ $tareas->encargados->nombre }} {{ $tareas->encargados->apellido }}</td>
            <td>{{ $tareas->estado }}</td>
            <td>{{ $tareas->costo }}</td>
            <td>{{ $tareas->responsable}}</td>
            <td>
            <button 
                class="btn btn-warning btn-sm" 
                data-bs-toggle="modal" 
                data-bs-target="#modal{{$tareas->id_tarea}}"
                >Editar</button>
                @include('tarea.actualizar')
                <form action="{{ route('tarea.delete', $tareas->id_tarea) }}" method="POST" style="display:inline-block;">
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