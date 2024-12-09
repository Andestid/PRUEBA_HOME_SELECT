@extends('layouts.app')

@section('title', 'Crear tarea para incidencia')

@section('content')
<div class="card" style="width: 30rem; margin: 0 auto;">
  <div class="card-body">
    <h5 class="card-title">Añadir tarea</h5>
    <form method="POST" action="{{ route('tarea.guardar') }}">
      @csrf
      <div class="form-group mb-3">
        <label for="id_incidencia">ID Incidencia:</label>
        <input type="int" id="id_incidencia" name="id_incidencia" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="descripcion">Descripcion:</label>
        <input type="label" id="descripcion" name="descripcion" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="id_encargado">ID Encargado:</label>
        <input type="int" id="id_encargado" name="id_encargado" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="costo">Costo:</label>
        <input type="int" id="costo" name="costo" value=0 class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="responsable">Responsable:</label>
        <select id="responsable" name="responsable" class="form-control" required>
                <option value="cliente">Cliente</option>
                <option value="propietario">Propietario</option>
                <option value="homeselect">HomeSelect</option>
            </select>
      </div>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <div class="mt-3">
      <a href="{{ route('tarea.leer') }}" class="btn btn-success">Ver Lista de tareas</a>
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
