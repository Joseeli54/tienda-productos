<div class="modal fade" id="editAlmacen" tabindex="-1" aria-labelledby="editAlmacenLabel" 
aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAlmacenLabel">Editar Almacén</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="numero" class="col-form-label">Numero</label>
            <input type="number" class="form-control form-control-lg" id="putNumeroAlmacen" name="numero">
          </div>
          <div class="mb-3">
            <label for="tipo" class="col-form-label">Tipo</label>
            <input class="form-control form-control-lg" id="putTipoAlmacen" name="tipo">
          </div>
          <div class="mb-3">
            <label for="descripcion" class="col-form-label">Descripción del Almacen</label>
            <textarea class="form-control form-control-lg" id="putDescripcionAlmacen" name="descripcion"></textarea>
          </div>
          <input type="hidden" name="id" id="putIdAlmacen">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModalEditAlmacen">Cerrar</button>
        <button type="button" class="btn btn-primary" id="updateAlmacen">Editar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    var element = document.getElementById("updateAlmacen");

    function llenarFormAlmacen(id, numero, tipo, descripcion){
       document.getElementById('putIdAlmacen').value = id;
       document.getElementById('putNumeroAlmacen').value = numero;
       document.getElementById('putTipoAlmacen').value = tipo;
       document.getElementById('putDescripcionAlmacen').value = descripcion;
    }

    element.addEventListener('click',
    function(e) {
      let formData = new FormData();

      formData.append('id', document.getElementById('putIdAlmacen').value);
      formData.append('numero', document.getElementById('putNumeroAlmacen').value);
      formData.append('tipo', document.getElementById('putTipoAlmacen').value);
      formData.append('descripcion', document.getElementById('putDescripcionAlmacen').value);
      formData.append('axios', 1);
      formData.append('_method', 'PUT');

      axios.post("/almacen/" + document.getElementById('putIdAlmacen').value, formData)
          .then(function(res) {
              if(res.status == 200){
                  let data = res.data.product;

                  console.log(res);

                  document.getElementById('putIdAlmacen').value = '';
                  document.getElementById('putNumeroAlmacen').value = '';
                  document.getElementById('putTipoAlmacen').value = '';
                  document.getElementById('putDescripcionAlmacen').value = '';
                  $('#cerrarModalEditAlmacen').click();

                  location.reload();
              }
          })
          .catch(function(err) {
              console.log(err);
          });

    }, false);
</script>
