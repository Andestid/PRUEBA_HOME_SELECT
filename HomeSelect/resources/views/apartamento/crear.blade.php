@extends('layouts.app')

@section('title', 'Añadir Apartamento')

@section('content')
<div class="card" style="width: 30rem; margin: 0 auto;">
  <div class="card-body">
    <h5 class="card-title">Añadir Apartamento</h5>
    <form method="POST" action="{{ route('apartamento.guardar') }}">
      @csrf
      <div class="form-group mb-3">
        <label for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="direccion" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="descripcion">Descripcion:</label>
        <input type="label" id="descripcion" name="descripcion" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="id_propietario">ID_propietario:</label>
        <input type="int" id="id_propietario" name="id_propietario" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="costoxdia">Valor por dia:</label>
        <input type="double" id="costoxdia" name="costoxdia" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <div class="mt-3">
      <a href="{{ route('apartamento.leer') }}" class="btn btn-success">Ver Lista de Apartamentos</a>
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
