<div class="modal fade" id="deleteProducto" tabindex="-1" 
     aria-labelledby="deleteProductoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteProductoLabel">¿Usted desea eliminar este producto?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            Si elimina este producto, se eliminará permanentemente.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <form method="POST" class="my-auto" id="formularioEliminarProducto" action="/productos/">
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

<script type="text/javascript">
  function setURLDeleteFormProducto(button){
      var formularioEliminarProducto = document.getElementById('formularioEliminarProducto');
      formularioEliminarProducto.setAttribute('action', '/productos/' + button.getAttribute('data-value'));
  }
</script>