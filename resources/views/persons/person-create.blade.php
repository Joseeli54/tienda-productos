<div class="modal fade" id="addPersona" tabindex="-1" aria-labelledby="addPersonaLabel" 
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPersonaLabel">Crear Persona</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container-fluid">
                <div class="row mb-3 mx-md-5">
                    <div class="col-md-6 col-12">
                        <label for="nombre" class="col-md col-form-label text-md-start">{{ __('Nombre') }}</label>

                        <div class="col-md col-12">
                            <input id="nombre" type="text" class="form-control form-control-lg" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <label for="apellido" class="col-md col-form-label text-md-start">{{ __('Apellido') }}</label>

                        <div class="col-md col-12">
                            <input id="apellido" type="text" class="form-control form-control-lg" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <div class="col-md-6 col-12">
                        <label for="doc_persona" class="col-md col-form-label text-md-start">{{ __('Documento de Identidad') }}</label>
                        <div class="col-md col-12">
                            <input id="doc_persona" type="text" class="form-control form-control-lg" name="doc_persona" value="{{ old('doc_persona') }}" required autocomplete="doc_persona" autofocus>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="username" class="col-md col-form-label text-md-start">{{ __('Username') }}</label>
                        <div class="col-md col-12">
                            <input id="username" type="text" class="form-control form-control-lg" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <label for="correo" class="col-md col-form-label text-md-start">{{ __('Correo Electronico') }}</label>

                    <div class="col-md-12">
                        <input id="correo" type="email" class="form-control form-control-lg" name="correo" value="{{ old('correo') }}" required autocomplete="correo">
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <label for="fec_nac" class="col-md col-form-label text-md-start">{{ __('Fecha de Nacimiento') }}</label>

                    <div class="col-md-12">
                        <input id="fec_nac" type="date" class="form-control form-control-lg" name="fec_nac" value="{{ old('fec_nac') }}" required autocomplete="fec_nac">
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <label for="telefono" class="col-md col-form-label text-md-start">{{ __('Telefono') }}</label>

                    <div class="col-md-12">
                        <input id="telefono" type="text" class="form-control form-control-lg" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <label for="id_rol" class="col-form-label">Ocupación</label>
                    
                    <div class="col-md-12">
                        <select id="id_rol" name="id_rol" class="form-select form-select-lg" required>
                            <option value="" class="id_roles" selected> Seleccionar Ocupación</option>
                            <option value="1"> Administrador </option>
                            <option value="2"> Despachador </option>
                            <option value="3"> Operario </option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <label for="password" class="col-md col-form-label text-md-start">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control form-control-lg" name="password" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-3 mx-md-5">
                    <label for="password-confirm" class="col-md col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12 d-flex">
                        <button type="submit" class="btn btn-primary ms-auto me-2" id="createPerson">
                            Crear Usuario
                        </button>

                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal" id="cerrarModalPersona">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  var element = document.getElementById("createPerson");

  element.addEventListener('click',
    function(e) {
        let formData = new FormData();
        formData.append('nombre', document.getElementById('nombre').value);
        formData.append('apellido', document.getElementById('apellido').value);
        formData.append('correo', document.getElementById('correo').value);
        formData.append('doc_persona', document.getElementById('doc_persona').value);
        formData.append('username', document.getElementById('username').value);
        formData.append('telefono', document.getElementById('telefono').value);
        formData.append('password', document.getElementById('password').value);
        formData.append('fec_nac', document.getElementById('fec_nac').value);
        formData.append('id_rol', document.getElementById('id_rol').value);

        axios.post("/crearpersona", formData)
            .then(function(res) {
                if(res.status == 200){
                    let data = res.data.person;
                    $('#personaEmpty').hide();

                    $('#contenedorPersonas').prepend(
                        '<hr>'+
                        '<div class="col-md-12 col-12">'+
                            '<h6>'+ data['nombre'] + ' '+ data['apellido'] + '</h6>'+
                            '<h6><b>Nombre de Usuario: </b> '+ data['username'] + '</h6>'+
                            '<p> Fecha de creación: '+ data['created_at'] +'</p>'+
                        '</div>'+
                        '<div class="col-md-12 col-12 d-flex">'+
                            '<a class="text-danger text-decoration-none mx-auto my-auto delete-button-persona" data-value="'+data['id']+'" data-bs-toggle="modal" data-bs-target="#deletePersona" style="cursor: pointer;" onclick="setURLDeleteFormAlmacen(this)">'+
                                '<i class="fa fa-trash fa-1x me-2"></i> Eliminar'+
                            '</a>'+
                            '<a class="mx-auto my-auto text-decoration-none" style="cursor: pointer;">'+
                                '<i class="fa fa-edit fa-1x me-2"></i> Editar'+
                            '</a>'+
                        '</div>'
                    );

                    document.getElementById('nombre').value = "";
                    document.getElementById('apellido').value = "";
                    document.getElementById('correo').value = "";
                    document.getElementById('doc_persona').value = "";
                    document.getElementById('username').value = "";
                    document.getElementById('telefono').value = "";
                    document.getElementById('password').value = "";
                    document.getElementById('fec_nac').value = "";
                    document.getElementById('id_rol').value = "";
                    $('#cerrarModalPersona').click();

                    location.reload();
                }
            })
            .catch(function(err) {
                console.log(err);
            });

    }, false);
</script>