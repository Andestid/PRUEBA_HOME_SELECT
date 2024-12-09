
<!-- Modal -->
<div class="modal fade" id="modal{{$reservas->id_reserva}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Reserva</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('reserva.update', $reservas->id_reserva) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_cliente">ID cliente:</label>
            <input type="int" id="id_cliente" name="id_cliente" value="{{$reservas->id_cliente}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_apartamento">ID apartamento:</label>
            <input type="int" id="id_apartamento" name="id_apartamento" value="{{$reservas->id_apartamento}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{$reservas->fecha_inicio}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_fin">Fecha Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" value="{{$reservas->fecha_fin}}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>