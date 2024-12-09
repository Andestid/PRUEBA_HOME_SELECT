@extends('layouts.app')

@section('title', 'Reservar un apartamento')

@section('content')
<div class="card" style="width: 30rem; margin: 0 auto;">
  <div class="card-body">
    <h5 class="card-title">Reserva</h5>
    <form method="POST" action="{{ route('reserva.guardar') }}">
      @csrf
      <div class="form-group mb-3">
        <label for="id_cliente">ID Cliente:</label>
        <input type="number" id="id_cliente" name="id_cliente" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="id_apartamento">ID Apartamento:</label>
        <input type="number" id="id_apartamento" name="id_apartamento" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="fecha_fin">Fecha Fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <div class="mt-3">
      <a href="{{ route('reserva.leer') }}" class="btn btn-success">Ver todas las reservas</a>
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