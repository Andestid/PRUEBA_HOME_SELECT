@extends('layouts.app')

@section('title', 'Crear incidencia')

@section('content')
<div class="card" style="width: 30rem; margin: 0 auto;">
  <div class="card-body">
    <h5 class="card-title">Añadir incidencia</h5>
    <form method="POST" action="{{ route('incidencia.guardar') }}">
      @csrf
      <div class="form-group mb-3">
        <label for="id_reserva">ID Reserva:</label>
        <input type="int" id="id_reserva" name="id_reserva" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="comentario">comentario:</label>
        <input type="label" id="comentario" name="comentario" class="form-control" required>
      </div>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <div class="mt-3">
      <a href="{{ route('incidencia.leer') }}" class="btn btn-success">Ver Lista de Incidencias</a>
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
