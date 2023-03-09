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
              <input class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
              <label for="precio" class="col-form-label">Precio</label>
              <input type="number" class="form-control" id="precio" name="precio" step="any">
            </div>
            <div class="mb-3">
              <label for="tipo" class="col-form-label">Tipo</label>
              <input class="form-control" id="tipo" name="tipo">
            </div>
            <div class="mb-3">
              <label for="moneda" class="col-form-label">Moneda</label>
              <input class="form-control" id="moneda" name="moneda">
            </div>

            <div class="mb-3">
              <label for="id_almacen" class="col-form-label">Asignar un Almacén</label>
              <select id="id_almacen" name="id_almacen" class="form-select">
                  <option selected>Seleccione un almacén para el producto</option>
                @foreach($almacenes as $almacen)
                  <option value="{{ $almacen->id }}"> Almacén numero {{ $almacen->numero }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="descripcion" class="col-form-label">Descripción del Producto</label>
              <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
            <div class="form-group">
              <label for="imagen" class="col-form-label">Agregar imagen del producto</label>
              <div> 
                <input type="file" onchange="loadFile(event)" style="display: none;" name="imagen" id="imagen" accept="image/*">

                <div>
                  <img id="imgOutput" class="my-2 rounded" style="display: none; position: relative;" width="100" height="100">
                </div>
                <div class="d-flex">
                  <button class="btn btn-primary mx-1" id="boton-agregar" onclick="$('#imagen').click()">Agregar</button>
                  <button class="btn btn-danger mx-1" id="boton-eliminar" onclick="deleteFile()" style="display: none">Eliminar</button>
                </div>

              </div>
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

      var file = document.querySelector('#imagen');
      formData.append("imagen", file.files[0]);

      formData.append('codigo', document.getElementById('codigo').value);
      formData.append('nombre', document.getElementById('nombre').value);
      formData.append('precio', document.getElementById('precio').value);
      formData.append('tipo', document.getElementById('tipo').value);
      formData.append('moneda', document.getElementById('moneda').value);
      formData.append('descripcion', document.getElementById('descripcion').value);
      formData.append('id_almacen', document.getElementById('id_almacen').value);

      axios.post("/productos", formData)
          .then(function(res) {
              if(res.status == 200){
                  let data = res.data.product;
                  $('#productosEmpty').hide();

                  var urlImagen = location.origin + '/insertado/producto/' + data['imagen']; 

                  $('#contenedorProductos').prepend(
                      '<div class="col-md-3 col-12">'+
                        '<div class="card">'+
                            '<div class="card-header text-center">'+
                              '<h3>'+ data['nombre'] +'</h3>'+
                            '</div>'+
                            '<div class="card-body text-center">'+
                                '<div class="text-center my-3">'+
                                  '<img src="'+ urlImagen + '" height="100" width="100">'+
                                '</div>'+
                                '<h6><b>'+ data['tipo'] +'</b></h6>'+
                                '<h6> Codigo #'+ data['codigo'] +'</h6>'+
                                '<h6><b>'+ data['precio'] +' '+ data['moneda'] +'</b></h6>'+
                                '<p>'+ data['descripcion'] +'</p>'+
                                '<div class="d-flex">'+
                                  '<button class="btn btn-primary mx-auto my-1" data-bs-toggle="modal" data-bs-target="#editProducto" onclick="llenarForm(' + data + ');">'+
                                  '<i class="fa fa-edit fa-1x me-2"></i> Editar</button>'+
                                '</div>'+
                                '<div class="d-flex">'+
                                  '<a class="btn btn-danger text-decoration-none mx-auto my-1" data-value="' + data['id'] + '" data-bs-toggle="modal" data-bs-target="#deleteProducto" style="cursor: pointer;" onclick="setURLDeleteFormProducto(this)">'+
                                      '<i class="fa fa-trash fa-1x me-2"></i> Eliminar'+
                                  '</a>'+
                                '</div>'+
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

    var loadFile = function(event) {
      var imgOutput = document.getElementById('imgOutput');
      var buttonCreateEdit = document.getElementById('boton-agregar');
      var buttonDelete = document.getElementById('boton-eliminar');
      
      imgOutput.style.display = "flex";
      buttonDelete.style.display = "block";
      buttonCreateEdit.innerText = "Editar";
      
      imgOutput.src = URL.createObjectURL(event.target.files[0]);
      imgOutput.onload = function() {
        URL.revokeObjectURL(imgOutput.src) // free memory
      }
    };

    var deleteFile = function(){
      var imgOutput = document.getElementById('imgOutput');
      var imagen = document.getElementById('imagen');
      var buttonCreateEdit = document.getElementById('boton-agregar');
      var buttonDelete = document.getElementById('boton-eliminar');

      imgOutput.src = "";
      imgOutput.style.display = "none";
      imagen.value = "";

      buttonCreateEdit.innerText = "Agregar";
      buttonDelete.style.display = "none";
    }

</script>