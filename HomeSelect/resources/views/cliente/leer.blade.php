@extends('layouts.app')
@section('content')
<h1>Clientes</h1> 
  <!-- Botón para regresar a la página de crear cliente -->
  <div class="mb-3">
    <a href="{{ route('cliente.crear') }}" class="btn btn-success">Crear Nuevo Cliente</a>
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
        @foreach($cliente as $clientes)
        <tr>
            <td>{{ $clientes->id_cliente }}</td>
            <td>{{ $clientes->nombre }}</td>
            <td>{{ $clientes->apellido }}</td>
            <td>{{ $clientes->email }}</td>
            <td>
            <button 
                    class="btn btn-warning btn-sm" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modal{{$clientes->id_cliente}}"
                >Editar</button>
                @include('cliente.actualizar')
                <form action="{{ route('cliente.delete', $clientes->id_cliente) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
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