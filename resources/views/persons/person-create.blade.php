<div class="modal fade" id="addPersona" tabindex="-1" aria-labelledby="addPersonaLabel" 
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPersonaLabel">Crear Almacén</h5>
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
                        <button type="submit" class="btn btn-primary mx-auto">
                            Crear Usuario
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>