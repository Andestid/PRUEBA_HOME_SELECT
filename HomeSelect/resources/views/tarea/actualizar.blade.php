
<!-- Modal -->
<div class="modal fade" id="modal{{$tareas->id_tarea}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar tarea</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('tarea.update', $tareas->id_tarea) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <input type="text" id="descripcion" name="descripcion" value="{{$tareas->descripcion}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_encargado">ID encargado:</label>
            <input type="int" id="id_encargado" name="id_encargado" value="{{$tareas->id_encargado}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
        <select id="estado" name="estado" class="form-control" required>
                <option value="PROGRESO">PROGRESO</option>
                <option value="BLOQUEADA">BLOQUEADA</option>
                <option value="ARREGLADO">ARREGLADO</option>
            </select>
        </div>
        <div class="form-group">
            <label for="costo">Costo:</label>
            <input type="numeric" id="costo" name="costo" value="{{$tareas->costo}}" class="form-control" required>
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