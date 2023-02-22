  <div class="modal fade" id="addProducto" tabindex="-1" aria-labelledby="addProductoLabel" 
  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProductoLabel">Crear Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
              <label for="codigo" class="col-form-label">Codigo</label>
              <input type="number" class="form-control" id="codigo" name="codigo">
            </div>
            <div class="mb-3">
              <label for="nombre" class="col-form-label">Nombre</label>
              <input class="form-control" id="nombre" name="nombre"></input>
            </div>
            <div class="mb-3">
              <label for="precio" class="col-form-label">Precio</label>
              <input type="number" class="form-control" id="precio" name="precio"></input>
            </div>
            <div class="mb-3">
              <label for="tipo" class="col-form-label">Tipo</label>
              <input class="form-control" id="tipo" name="tipo"></input>
            </div>
            <div class="mb-3">
              <label for="moneda" class="col-form-label">Moneda</label>
              <input class="form-control" id="moneda" name="moneda"></input>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="col-form-label">Descripción del Producto</label>
              <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModalProducto">Cerrar</button>
          <button type="button" class="btn btn-primary" id="createProducto">Crear</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    var element = document.getElementById("createProducto");

    element.addEventListener('click',
        function(e) {
          let formData = new FormData();
          formData.append('codigo', document.getElementById('codigo').value);
          formData.append('nombre', document.getElementById('nombre').value);
          formData.append('precio', document.getElementById('precio').value);
          formData.append('tipo', document.getElementById('tipo').value);
          formData.append('moneda', document.getElementById('moneda').value);
          formData.append('descripcion', document.getElementById('descripcion').value);

          axios.post("/productos", formData)
              .then(function(res) {
                  if(res.status == 200){
                      let data = res.data.product;
                      $('#productosEmpty').hide();

                      $('#contenedorProductos').prepend(
                          '<div class="col-md-3 col-12">'+
                            '<div class="card">'+
                                '<div class="card-header text-center">'+
                                  '<h3>'+ data['nombre'] +'</h3>'+
                                '</div>'+
                                '<div class="card-body text-center">'+
                                    '<h6>'+ data['tipo'] +'</h6>'+
                                    '<h6> Codigo #'+ data['codigo'] +'</h6>'+
                                    '<h6>'+ data['precio'] +' '+ data['moneda'] +'</h6>'+
                                    '<p>'+ data['descripcion'] +'</p>'+
                                '</div>'+
                            '</div>'+
                          '</div>'
                      );

                      document.getElementById('codigo').value = '';
                      document.getElementById('nombre').value = '';
                      document.getElementById('precio').value = '';
                      document.getElementById('tipo').value = '';
                      document.getElementById('moneda').value = '';
                      document.getElementById('descripcion').value = '';
                      $('#cerrarModalProducto').click();
                  }
              })
              .catch(function(err) {
                  console.log(err);
              });

        }, false);

</script>