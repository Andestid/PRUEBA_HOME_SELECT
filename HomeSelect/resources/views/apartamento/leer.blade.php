@extends('layouts.app')
@section('content')
<h1>Apartamentos</h1> 
  <!-- Botón para regresar a la página de crear apartamento -->
  <div class="mb-3">
    <a href="{{ route('apartamento.crear') }}" class="btn btn-success">Crear Nuevo Apartamento</a>
  </div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">direccion</th>
            <th scope="col">descripcion</th>
            <th scope="col">Nombre propietario</th>
            <th scope="col">Valor por dia</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($apartamento as $apartamentos)
        <tr>
            <td>{{ $apartamentos->id_apartamento }}</td>
            <td>{{ $apartamentos->direccion }}</td>
            <td>{{ $apartamentos->descripcion }}</td>
            <td>{{ $apartamentos->propietario->nombre }} {{ $apartamentos->propietario->apellido }}</td>
            <td>{{ $apartamentos->costoxdia }}</td>
            
            <td>
            <button 
                    class="btn btn-warning btn-sm" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modal{{$apartamentos->id_apartamento}}"
                >Editar</button>
                @include('apartamento.actualizar')
                <form action="{{ route('apartamento.delete', $apartamentos->id_apartamento) }}" method="POST" style="display:inline-block;">
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