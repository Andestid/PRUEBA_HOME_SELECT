@extends('layouts.app')
@section('content')
<h1>Pagos</h1> 
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID reserva</th>
            <th scope="col">Propietario</th>
            <th scope="col">Fecha</th>
            <th scope="col">Monto</th>
            <th scope="col">ID tarea</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Pago as $Pagos)
        <tr>
            <td>{{ $Pagos->id_pago }}</td>
            <td>{{ $Pagos->id_reserva }}</td>
            <td>{{ optional($Pagos->reserva)?->apartamento?->propietario?->nombre}} {{ optional($Pagos->reserva)?->apartamento?->propietario?->apellido}}</td>
            <td>{{ $Pagos->fecha_pago }}</td>
            <td>{{ $Pagos->monto }}</td>
            <td>{{ $Pagos->id_tarea  }}</td>
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