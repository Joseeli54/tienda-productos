<div class="modal fade" id="deleteAlmacen" tabindex="-1" 
     aria-labelledby="deleteAlmacenLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteAlmacenLabel">¿Usted desea eliminar este almacén?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            Si elimina este almacén, los productos registrados en el mismo seran eliminados del registro. 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <form method="POST" class="my-auto" id="formularioEliminarAlmacen" action="/deletealmacen/0">
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
    function setURLDeleteFormAlmacen(button){
        var formularioEliminarAlmacen = document.getElementById('formularioEliminarAlmacen');
        formularioEliminarAlmacen.setAttribute('action', '/deletealmacen/' + button.getAttribute('data-value'));
    }
</script>