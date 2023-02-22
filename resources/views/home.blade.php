@extends('layouts.main')

@section('title', 'Inicio')

@section('contenido')
<div class="d-flex">
    <div class="container-fluid my-4 mx-md-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card font-size-title">
                    <div class="card-header">Almacenes</div>

                    <div class="card-body font-size-page">
                        {{-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif --}}
                        <div class="my-2 text-primary">
                            <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#addAlmacen"> <i class="fa fa-plus fa-1x"></i> Crear Almacen</a>
                        </div>

                        @if(!empty($almacenes))
                            <p id="almacenesEmpty" style="display: none;">No hay almacenes disponibles...</p>
                        @else
                            <p id="almacenesEmpty">No hay almacenes disponibles...</p>
                        @endif

                        <div class="container">
                            <div class="row my-3" id="contenedorAlmacenes">
                                @foreach($almacenes as $almacen)
                                    <hr>
                                    <div class="col-md-8 col-12">
                                        <h6>Almacen Numero {{ $almacen->numero }}</h6>
                                        <h6><b>Tipo:</b> {{ $almacen->tipo }}</h6>
                                        <p>{{ $almacen->descripcion }}</p>
                                    </div>
                                    <div class="col-md col-12 d-flex">
                                        <a class="text-danger text-decoration-none mx-2 my-auto delete-button-almacen" data-value="{{ $almacen->id }}" data-bs-toggle="modal" data-bs-target="#deleteAlmacen" style="cursor: pointer;" onclick="setURLDeleteFormAlmacen(this)">
                                            <i class="fa fa-trash fa-1x me-2"></i> Eliminar
                                        </a>

                                        <a class="mx-2 my-auto text-decoration-none" style="cursor: pointer;">
                                            <i class="fa fa-edit fa-1x me-2"></i>Editar
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="d-flex my-2">
                    <a class="btn mx-auto ng-white" style="border: 1px solid;">Ver mas...</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card font-size-title">
                    <div class="card-header">Usuarios</div>

                    <div class="card-body font-size-page">
                        {{-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif --}}
                        <div class="my-2 text-primary">
                            <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#addPersona"> <i class="fa fa-plus fa-1x"></i> Crear Usuario</a>
                        </div>

                        @if(!empty($persons))
                            <p id="personaEmpty" style="display: none">No hay usuarios disponibles...</p>
                        @else
                            <p id="personaEmpty" >No hay usuarios disponibles...</p>
                        @endif

                        <div class="container">
                            <div class="row my-3" id="contenedorPersonas">
                                @foreach($persons as $person)
                                    <hr>
                                    <div class="col-md-12 col-12">
                                        <h6> {{ $person->nombre }} {{ $person->apellido }}</h6>
                                        <h6><b>Nombre Usuario:</b> {{ $person->username }}</h6>
                                        <p>Fecha de creación: {{ $person->created_at }}</p>
                                    </div>
                                    <div class="col-md-12 col-12 d-flex">
                                        <a class="text-danger text-decoration-none my-1 mx-auto delete-button-persona" data-value="{{ $person->id }}" data-bs-toggle="modal" data-bs-target="#deletePersona" style="cursor: pointer;">
                                            <i class="fa fa-trash fa-1x me-2"></i> Eliminar
                                        </a>

                                        <a class="mx-auto my-1 text-decoration-none" style="cursor: pointer;">
                                            <i class="fa fa-edit fa-1x me-2"></i> Editar
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="d-flex my-2">
                    <a class="btn mx-auto ng-white" style="border: 1px solid;">Ver mas...</a>
                </div>
            </div>
        </div>
    </div>

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
                <input type="number" class="form-control" id="numero" name="numero">
              </div>
              <div class="mb-3">
                <label for="tipo" class="col-form-label">Tipo</label>
                <input class="form-control" id="tipo" name="tipo"></input>
              </div>
              <div class="mb-3">
                <label for="descripcion" class="col-form-label">Descripción del Almacen</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModalAlmacen">Cerrar</button>
            <button type="button" class="btn btn-primary" id="createAlmacen">Crear</button>
          </div>
        </div>
      </div>
    </div>

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
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <label for="apellido" class="col-md col-form-label text-md-start">{{ __('Apellido') }}</label>

                            <div class="col-md col-12">
                                <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 mx-md-5">
                        <div class="col-md-6 col-12">
                            <label for="doc_persona" class="col-md col-form-label text-md-start">{{ __('Documento de Identidad') }}</label>
                            <div class="col-md col-12">
                                <input id="doc_persona" type="text" class="form-control" name="doc_persona" value="{{ old('doc_persona') }}" required autocomplete="doc_persona" autofocus>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="username" class="col-md col-form-label text-md-start">{{ __('Username') }}</label>
                            <div class="col-md col-12">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 mx-md-5">
                        <label for="correo" class="col-md col-form-label text-md-start">{{ __('Correo Electronico') }}</label>

                        <div class="col-md-12">
                            <input id="correo" type="email" class="form-control" name="correo" value="{{ old('correo') }}" required autocomplete="correo">
                        </div>
                    </div>

                    <div class="row mb-3 mx-md-5">
                        <label for="fec_nac" class="col-md col-form-label text-md-start">{{ __('Fecha de Nacimiento') }}</label>

                        <div class="col-md-12">
                            <input id="fec_nac" type="date" class="form-control" name="fec_nac" value="{{ old('fec_nac') }}" required autocomplete="fec_nac">
                        </div>
                    </div>

                    <div class="row mb-3 mx-md-5">
                        <label for="telefono" class="col-md col-form-label text-md-start">{{ __('Telefono') }}</label>

                        <div class="col-md-12">
                            <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">
                        </div>
                    </div>

                    <div class="row mb-3 mx-md-5">
                        <label for="password" class="col-md col-form-label text-md-start">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3 mx-md-5">
                        <label for="password-confirm" class="col-md col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
            <form method="POST" class="my-auto" id="formularioEliminarAlmacen" action="/almacenes/">
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

    <div class="modal fade" id="deletePersona" tabindex="-1" 
         aria-labelledby="deletePersonaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deletePersonaLabel">¿Usted desea eliminar este usuario?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                Se eliminará de forma permanente este usuario y sus datos.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <form method="POST" class="my-auto" id="formularioEliminarAlmacen" action="/almacenes/">
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
</div> 

<script type="text/javascript">
    var element = document.getElementById("createAlmacen");

    element.addEventListener('click',
        function(e) {
            let formData = new FormData();
            formData.append('numero', document.getElementById('numero').value);
            formData.append('tipo', document.getElementById('tipo').value);
            formData.append('descripcion', document.getElementById('descripcion').value);

            axios.post("/almacen", formData)
                .then(function(res) {
                    if(res.status == 200){
                        let data = res.data.almacen;
                        $('#almacenesEmpty').hide();

                        $('#contenedorAlmacenes').prepend(
                            '<hr>'+
                            '<div class="col-md-9 col-12">'+
                                '<h6>Almacen Numero '+ data['numero'] + '</h6>'+
                                '<h6><b>Tipo: </b> '+ data['tipo'] + '</h6>'+
                                '<p>'+ data['descripcion'] +'</p>'+
                            '</div>'+
                            '<div class="col-md-3 col-12 d-flex">'+
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
                    }
                })
                .catch(function(err) {
                    console.log(err);
                });

        }, false);

    function setURLDeleteFormAlmacen(button){
        var formularioEliminarAlmacen = document.getElementById('formularioEliminarAlmacen');
        formularioEliminarAlmacen.setAttribute('action', '/almacenes/' + button.getAttribute('data-value'));
    }
        
</script>
@endsection
