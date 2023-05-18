<div class="modal fade" id="putPersona" tabindex="-1" aria-labelledby="putPersonaLabel" 
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="putPersonaLabel">Editar Persona</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container-fluid">
                <div class="row mb-3 mx-md-5">
                    <div class="col-md-6 col-12">
                        <label for="putNombre" class="col-md col-form-label text-md-start">{{ __('Nombre') }}</label>

                        <div class="col-md col-12">
                            <input id="putNombre" type="text" class="form-control form-control-lg" name="nombre" required autocomplete="nombre" autofocus>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <label for="putApellido" class="col-md col-form-label text-md-start">{{ __('Apellido') }}</label>

                        <div class="col-md col-12">
                            <input id="putApellido" type="text" class="form-control form-control-lg" name="apellido" required autocomplete="apellido" autofocus>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <div class="col-md-6 col-12">
                        <label for="putDoc_persona" class="col-md col-form-label text-md-start">{{ __('Documento de Identidad') }}</label>
                        <div class="col-md col-12">
                            <input id="putDoc_persona" type="text" class="form-control form-control-lg" name="doc_persona" required autocomplete="doc_persona" autofocus>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="putUsername" class="col-md col-form-label text-md-start">{{ __('Username') }}</label>
                        <div class="col-md col-12">
                            <input id="putUsername" type="text" class="form-control form-control-lg" name="username" required autocomplete="username" autofocus>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <label for="putCorreo" class="col-md col-form-label text-md-start">{{ __('Correo Electronico') }}</label>

                    <div class="col-md-12">
                        <input id="putCorreo" type="email" class="form-control form-control-lg" name="correo" required autocomplete="correo">
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <label for="putFec_nac" class="col-md col-form-label text-md-start">{{ __('Fecha de Nacimiento') }}</label>

                    <div class="col-md-12">
                        <input id="putFec_nac" type="date" class="form-control form-control-lg" name="fec_nac"required autocomplete="fec_nac">
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <label for="putTelefono" class="col-md col-form-label text-md-start">{{ __('Telefono') }}</label>

                    <div class="col-md-12">
                        <input id="putTelefono" type="text" class="form-control form-control-lg" name="telefono" required autocomplete="telefono">
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <label for="putId_rol" class="col-form-label">Ocupación</label>
                    
                    <div class="col-md-12">
                        <select id="putId_rol" name="id_rol" class="form-select form-select-lg" required>
                            <option value="" class="id_roles" selected> Seleccionar Ocupación</option>
                            <option value="1"> Administrador </option>
                            <option value="2"> Despachador </option>
                            <option value="3"> Operario </option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="id" id="putIdPerson">

                <div class="row mb-3">
                    <div class="col-md-12 d-flex">
                        <button type="submit" class="btn btn-primary ms-auto me-2" id="putPerson">
                            Editar Usuario
                        </button>

                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal" id="cerrarPutModalPersona">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var element = document.getElementById("putPerson");

    function llenarFormPersona(id, nombre, apellido, doc_persona, username, correo, fec_nac, telefono, id_rol){
       document.getElementById('putIdPerson').value = id;
       document.getElementById('putNombre').value = nombre;
       document.getElementById('putApellido').value = apellido;
       document.getElementById('putDoc_persona').value = doc_persona;
       document.getElementById('putUsername').value = username;
       document.getElementById('putCorreo').value = correo;
       document.getElementById('putFec_nac').value = fec_nac;
       document.getElementById('putTelefono').value = telefono;
       document.getElementById('putId_rol').value = id_rol;
    }

    element.addEventListener('click',
    function(e) {
      let formData = new FormData();

      formData.append('id', document.getElementById('putIdPerson').value);
      formData.append('nombre', document.getElementById('putNombre').value);
      formData.append('apellido', document.getElementById('putApellido').value);
      formData.append('doc_persona', document.getElementById('putDoc_persona').value);
      formData.append('username', document.getElementById('putUsername').value);
      formData.append('correo', document.getElementById('putCorreo').value);
      formData.append('fec_nac', document.getElementById('putFec_nac').value);
      formData.append('telefono', document.getElementById('putTelefono').value);
      formData.append('id_rol', document.getElementById('putId_rol').value);
      formData.append('axios', 1);
      formData.append('_method', 'PUT');

      axios.post("/editarpersona/" + document.getElementById('putIdPerson').value, formData)
          .then(function(res) {
              if(res.status == 200){
                  let data = res.data.product;

                  document.getElementById('putIdPerson').value = "";
                  document.getElementById('putNombre').value = "";
                  document.getElementById('putApellido').value = "";
                  document.getElementById('putDoc_persona').value = "";
                  document.getElementById('putUsername').value = "";
                  document.getElementById('putCorreo').value = "";
                  document.getElementById('putFec_nac').value = "";
                  document.getElementById('putTelefono').value = "";
                  document.getElementById('putId_rol').value = "";

                  $('#cerrarPutModalPersona').click();
                  location.reload();
              }
          })
          .catch(function(err) {
              console.log(err);
          });

    }, false);
</script>
