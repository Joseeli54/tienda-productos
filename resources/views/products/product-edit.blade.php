  <div class="modal fade" id="editProducto" tabindex="-1" aria-labelledby="editProductoLabel" 
  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProductoLabel">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
              <label for="codigo" class="col-form-label">Codigo</label>
              <input type="number" class="form-control form-control-lg" id="putCodigo" name="codigo">
            </div>
            <div class="mb-3">
              <label for="nombre" class="col-form-label">Nombre</label>
              <input class="form-control form-control-lg" id="putNombre" name="nombre">
            </div>
            <div class="mb-3">
              <label for="precio" class="col-form-label">Precio</label>
              <input type="number" class="form-control form-control-lg" id="putPrecio" name="precio">
            </div>
            <div class="mb-3">
              <label for="tipo" class="col-form-label">Tipo</label>
              <input class="form-control form-control-lg" id="putTipo" name="tipo">
            </div>
            <div class="mb-3">
              <label for="moneda" class="col-form-label">Moneda</label>
              <input class="form-control form-control-lg" id="putMoneda" name="moneda">
            </div>
            <div class="mb-3">
              <label for="cantidad" class="col-form-label">Cantidad</label>
              <input type="number" class="form-control form-control-lg" id="putCantidad" name="cantidad">
            </div>
            <div class="mb-3">
              <label for="putIdAlmacen" class="col-form-label">Asignar un Almacén</label>
              <select id="putIdAlmacen" name="putIdAlmacen" class="form-select form-select-lg">
                  <option selected>Seleccione un almacén para el producto</option>
                @foreach($almacenes as $almacen)
                  <option value="{{ $almacen->id }}"> Almacén numero {{ $almacen->numero }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="putIdMarca" class="col-form-label">Marca del Producto</label>
              <select id="putIdMarca" name="putIdMarca" class="form-select form-select-lg">
                  <option selected>Seleccione la marca del producto</option>
                @foreach($marcas as $marca)
                  <option value="{{ $marca->id }}"> {{ $marca->nombre }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="putIdZona" class="col-form-label">Zona del Producto</label>
              <select id="putIdZona" name="putIdZona" class="form-select form-select-lg">
                  <option value="none" selected>Seleccione la zona donde estará el producto</option>
                @foreach($zonas as $zona)
                  <option value="{{ $zona->id }}" class="almacenEdit-{{ $zona->id_almacen }} zonas-option-edit"> Zona #{{ $zona->numero }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="col-form-label">Descripción del Producto</label>
              <textarea class="form-control form-control-lg" id="putDescripcion" name="descripcion"></textarea>
            </div>
            <div class="form-group">
              <label for="imagen" class="col-form-label">Agregar imagen del producto</label>
              <div> 
                <input type="file" onchange="loadFileEdit(event)" style="display: none;" id="putImagen" accept="image/*">
                <input type="hidden" style="display: none;" name="imagen" id="putImagenText">

                <div>
                  <img id="editImgOutput" class="my-2 rounded" style="display: none; position: relative;" width="100" height="100">
                </div>
                <div class="d-flex">
                  <button class="btn btn-primary mx-1" id="boton-agregar-edit" onclick="$('#putImagen').click()">Editar</button>
                  <button class="btn btn-danger mx-1" id="boton-eliminar-edit" onclick="deleteFileEdit()">Eliminar</button>
                </div>

              </div>
            </div> 
            <input type="hidden" name="id" id="putId">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModalProductoEdit">Cerrar</button>
          <button type="button" class="btn btn-primary" id="updateProducto">Editar</button>
        </div>
      </div>
    </div>
  </div>

    <script type="text/javascript">
    var element = document.getElementById("updateProducto");

    function llenarForm(codigo, nombre, precio, tipo, moneda, descripcion, id, imagen, id_almacen, id_marca, cantidad, id_zona){
       document.getElementById('putCodigo').value = codigo;
       document.getElementById('putNombre').value = nombre;
       document.getElementById('putPrecio').value = precio;
       document.getElementById('putTipo').value = tipo;
       document.getElementById('putMoneda').value = moneda;
       document.getElementById('putDescripcion').value = descripcion;
       document.getElementById('putId').value = id;
       document.getElementById('putImagenText').value = imagen;
       document.getElementById('putIdAlmacen').value = id_almacen;
       $('.zonas-option-edit').hide();
       $('.almacenEdit-'+id_almacen).show();

       document.getElementById('putIdMarca').value = id_marca;
       document.getElementById('putIdZona').value = id_zona;
       document.getElementById('putCantidad').value = cantidad;
       
       document.getElementById('editImgOutput').src = location.origin + '/insertado/producto/' + imagen;
       document.getElementById('editImgOutput').style.display = "block";
    }

    var loadFileEdit = function(event) {
      var imgOutput = document.getElementById('editImgOutput');
      var buttonCreateEdit = document.getElementById('boton-agregar-edit');
      var buttonDelete = document.getElementById('boton-eliminar-edit');

      document.getElementById('putImagen').setAttribute('name', 'imagen');
      document.getElementById('putImagenText').setAttribute('name', '');

      imgOutput.style.display = "flex";
      buttonDelete.style.display = "block";
      buttonCreateEdit.innerText = "Editar";
      
      imgOutput.src = URL.createObjectURL(event.target.files[0]);
      imgOutput.onload = function() {
        URL.revokeObjectURL(imgOutput.src) // free memory
      }
    };

    var deleteFileEdit = function(){
      var imgOutput = document.getElementById('editImgOutput');
      var imagen = document.getElementById('putImagen');
      var buttonCreateEdit = document.getElementById('boton-agregar-edit');
      var buttonDelete = document.getElementById('boton-eliminar-edit');

      document.getElementById('putImagen').setAttribute('name', 'imagen');
      document.getElementById('putImagenText').setAttribute('name', '');

      imgOutput.src = "";
      imgOutput.style.display = "none";
      imagen.value = "";

      buttonCreateEdit.innerText = "Agregar";
      buttonDelete.style.display = "none";
    }

    element.addEventListener('click',
    function(e) {

      let formData = new FormData();

      var file = $('input[name="imagen"]');
      if(file[1].getAttribute('type') == "file"){
        formData.append("imagen", file[1].files[0]);
      }else{
        formData.append("imagen", file[1].value);
      }

      formData.append('codigo', document.getElementById('putCodigo').value);
      formData.append('nombre', document.getElementById('putNombre').value);
      formData.append('precio', document.getElementById('putPrecio').value);
      formData.append('tipo', document.getElementById('putTipo').value);
      formData.append('moneda', document.getElementById('putMoneda').value);
      formData.append('descripcion', document.getElementById('putDescripcion').value);
      formData.append('id_almacen', document.getElementById('putIdAlmacen').value);
      formData.append('id_marca', document.getElementById('putIdMarca').value);
      formData.append('id_zona', document.getElementById('putIdZona').value);
      formData.append('cantidad', document.getElementById('putCantidad').value);
      formData.append('_method', 'PUT');

      axios.post("/productos/" + document.getElementById('putId').value, formData)
          .then(function(res) {
              if(res.status == 200){
                  let data = res.data.product;

                  console.log(res);

                  document.getElementById('putCodigo').value = '';
                  document.getElementById('putNombre').value = '';
                  document.getElementById('putPrecio').value = '';
                  document.getElementById('putTipo').value = '';
                  document.getElementById('putMoneda').value = '';
                  document.getElementById('putDescripcion').value = '';
                  document.getElementById('putId').value = '';
                  document.getElementById('putImagenText').value = '';
                  document.getElementById('putIdAlmacen').value = '';
                  document.getElementById('putIdMarca').value = '';
                  document.getElementById('putIdZona').value = '';
                  document.getElementById('putCantidad').value = '';
                  $('#cerrarModalProductoEdit').click();

                  location.reload();
              }
          })
          .catch(function(err) {
              console.log(err);
          });

      }, false);

      $( document ).ready(function() {
          $("#putIdAlmacen").on("change", function(e){
            $('.zonas-option-edit').hide();
            $('.almacenEdit-'+$(this).val()).show();
            $('#putIdZona').val("none");
          });
      });

</script>