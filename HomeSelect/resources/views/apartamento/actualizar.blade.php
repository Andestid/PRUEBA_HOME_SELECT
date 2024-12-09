
<!-- Modal -->
<div class="modal fade" id="modal{{$apartamentos->id_apartamento}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Apartamento</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('apartamento.update', $apartamentos->id_apartamento) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion" value="{{$apartamentos->direccion}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <input type="text" id="descripcion" name="descripcion" value="{{$apartamentos->descripcion}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="costoxdia">Valor por dia:</label>
            <input type="double" id="costoxdia" name="costoxdia" value="{{$apartamentos->costoxdia}}" class="form-control" required>
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