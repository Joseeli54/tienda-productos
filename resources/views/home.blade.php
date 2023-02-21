@extends('layouts.main')

@section('title', 'Inicio')

@section('contenido')
<div class="d-flex">
    <div class="container my-2">
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

                        @if(empty($almacenes))
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
                                        <a class="text-danger text-decoration-none mx-2 my-auto delete-button-almacen" data-value="{{ $almacen->id }}" data-bs-toggle="modal" data-bs-target="#deleteAlmacen" style="cursor: pointer;">
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
                            <a style="cursor: pointer;"> <i class="fa fa-plus fa-1x"></i> Crear Usuario</a>
                        </div>
                        <p>No hay usuarios disponibles...</p>
                        
                    </div>
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

    <div class="modal fade" id="deleteAlmacen" tabindex="-1" 
         aria-labelledby="deleteAlmacenLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteAlmacenLabel">¿Usted desea eliminar este almacen?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                Si elimina este almacen, los productos registrados en el mismo seran eliminados del registro. 
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

                        console.log(res);

                        $('#contenedorAlmacenes').prepend(
                            '<hr>'+
                            '<div class="col-md-9 col-12">'+
                                '<h6>Almacen Numero '+ data['numero'] + '</h6>'+
                                '<h6><b>Tipo: </b> '+ data['tipo'] + '</h6>'+
                                '<p>'+ data['descripcion'] +'</p>'+
                            '</div>'+
                            '<div class="col-md-3 col-12 d-flex">'+
                                '<a class="btn btn-danger mx-2 my-auto delete-button-almacen" data-value="'+data['id']+'" data-bs-toggle="modal" data-bs-target="#deleteAlmacen">'+
                                    '<i class="fa fa-trash fa-1x me-2"></i>Eliminar'+
                                '</a>'+
                                '<a href="" class="text-primary mx-2 my-auto">'+
                                    '<i class="fa fa-edit fa-1x me-2"></i>Editar'+
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

    $( document ).ready(function() {
        $('.delete-button-almacen').on('click', function(e){
            $('#formularioEliminarAlmacen').attr('action', '/almacenes/' + $(this).attr('data-value'));
        });
    });
        
</script>
@endsection
