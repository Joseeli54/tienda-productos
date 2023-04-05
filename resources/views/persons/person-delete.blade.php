<div class="modal fade" id="deletePersona" tabindex="-1" 
     aria-labelledby="deletePersonaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletePersonaLabel">¿Usted desea eliminar este usuario?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            Se eliminará de forma permanente este usuario y sus datos.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <form method="POST" class="my-auto" id="formularioEliminarAlmacen" action="/almacenes/">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">
                Eliminar
            </button>
        </form>
      </div>
    </div>
  </div>
</div>