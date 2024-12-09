
<!-- Modal -->
<div class="modal fade" id="modal{{$incidencias->id_incidencia}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Incidencia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('incidencia.update', $incidencias->id_incidencia) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select id="estado{{$incidencias->id_incidencia}}" name="estado" class="form-control" required>
                <option value="ABIERTA" {{ $incidencias->estado == 'ABIERTA' ? 'selected' : '' }}>ABIERTA</option>
                <option value="SOLUCIONADA" {{ $incidencias->estado == 'SOLUCIONADA' ? 'selected' : '' }}>SOLUCIONADA</option>
                <option value="NO SOLUCIONADA" {{ $incidencias->estado == 'NO SOLUCIONADA' ? 'selected' : '' }}>NO SOLUCIONADA</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comentario">Comentario:</label>
            <input type="text" id="comentario" name="comentario" value="{{$incidencias->comentario}}" class="form-control" required>
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