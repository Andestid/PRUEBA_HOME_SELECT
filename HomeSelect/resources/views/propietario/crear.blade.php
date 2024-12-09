@extends('layouts.app')

@section('title', 'Añadir propietario')

@section('content')
<div class="card" style="width: 30rem; margin: 0 auto;">
  <div class="card-body">
    <h5 class="card-title">Añadir Propietario</h5>
    <form method="POST" action="{{ route('propietario.guardar') }}">
      @csrf
      <div class="form-group mb-3">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <div class="mt-3">
      <a href="{{ route('propietario.leer') }}" class="btn btn-success">Ver Lista de Propietarios</a>
    </div>
    @if (session('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ session('success') }}
      </div>
    @elseif (session('error'))
      <div class="alert alert-warning mt-3" role="alert">
        {{ session('error') }}
      </div>
    @endif
  </div>
</div>
@endsection
