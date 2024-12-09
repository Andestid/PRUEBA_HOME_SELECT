@extends('layouts.app')
@section('content')
<h1>Propietario</h1> 
  <!-- Botón para regresar a la página de crear propietario -->
  <div class="mb-3">
    <a href="{{ route('propietario.crear') }}" class="btn btn-success">Crear Nuevo Propietario</a>
  </div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($propietario as $propietarios)
        <tr>
            <td>{{ $propietarios->id_propietario }}</td>
            <td>{{ $propietarios->nombre }}</td>
            <td>{{ $propietarios->apellido }}</td>
            <td>{{ $propietarios->email }}</td>
            <td>
            <button 
                    class="btn btn-warning btn-sm" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modal{{$propietarios->id_propietario}}"
                >Editar</button>
                @include('propietario.actualizar')
                <form action="{{ route('propietario.delete', $propietarios->id_propietario) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este propietario?')">Eliminar</button>
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