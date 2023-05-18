<div class="modal fade" id="addAlmacen" tabindex="-1" aria-labelledby="addAlmacenLabel" 
aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAlmacenLabel">Crear Almacén</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="numero" class="col-form-label">Numero</label>
            <input type="number" class="form-control form-control-lg" id="numero" name="numero">
          </div>
          <div class="mb-3">
            <label for="tipo" class="col-form-label">Tipo</label>
            <input class="form-control form-control-lg" id="tipo" name="tipo">
          </div>
          <div class="mb-3">
            <label for="descripcion" class="col-form-label">Descripción del Almacen</label>
            <textarea class="form-control form-control-lg" id="descripcion" name="descripcion"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModalAlmacen">Cerrar</button>
        <button type="button" class="btn btn-primary" id="createAlmacen">Crear</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var element = document.getElementById("createAlmacen");

  element.addEventListener('click',
    function(e) {
        let formData = new FormData();
        formData.append('numero', document.getElementById('numero').value);
        formData.append('tipo', document.getElementById('tipo').value);
        formData.append('descripcion', document.getElementById('descripcion').value);

        axios.post("/crearalmacen", formData)
            .then(function(res) {
                if(res.status == 200){
                    let data = res.data.almacen;
                    $('#almacenesEmpty').hide();

                    $('#contenedorAlmacenes').prepend(
                        '<hr>'+
                        '<div class="col-md-8 col-12">'+
                            '<h6>Almacen Numero '+ data['numero'] + '</h6>'+
                            '<h6><b>Tipo: </b> '+ data['tipo'] + '</h6>'+
                            '<p>'+ data['descripcion'] +'</p>'+
                        '</div>'+
                        '<div class="col-md col-12 d-flex">'+
                            '<a class="text-danger text-decoration-none mx-2 my-auto delete-button-almacen" data-value="'+data['id']+'" data-bs-toggle="modal" data-bs-target="#deleteAlmacen" style="cursor: pointer;" onclick="setURLDeleteFormAlmacen(this)">'+
                                '<i class="fa fa-trash fa-1x me-2"></i> Eliminar'+
                            '</a>'+
                            '<a class="mx-2 my-auto text-decoration-none" style="cursor: pointer;">'+
                                '<i class="fa fa-edit fa-1x me-2"></i> Editar'+
                            '</a>'+
                        '</div>'
                    );

                    document.getElementById('numero').value = '';
                    document.getElementById('tipo').value = '';
                    document.getElementById('descripcion').value = '';
                    $('#cerrarModalAlmacen').click();

                    location.reload();
                }
            })
            .catch(function(err) {
                console.log(err);
            });

    }, false);
</script>