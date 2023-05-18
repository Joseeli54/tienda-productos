@extends('layouts.main')

@section('title', 'Inicio')

@section('contenido')
<div class="d-flex">
    <div class="container-fluid my-4 mx-md-5">

        @if($rol == 1)
            <h2>Usted es un administrador</h2>
        @endif

        @if($rol == 2)
            <h2>Usted es un despachador</h2>
        @endif

        @if($rol == 3)
            <h2>Usted es un operario</h2>
        @endif

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

                        @if($rol == 1 || $rol == 2)
                            <div class="my-2 text-primary">
                                <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#addAlmacen"> <i class="fa fa-plus fa-1x"></i> Crear Almacen</a>
                            </div>
                        @endif

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

                                        @if($rol == 1)
                                            <a class="text-danger text-decoration-none mx-2 my-auto delete-button-almacen" data-value="{{ $almacen->id }}" data-bs-toggle="modal" data-bs-target="#deleteAlmacen" style="cursor: pointer;" onclick="setURLDeleteFormAlmacen(this)">
                                                <i class="fa fa-trash fa-1x me-2"></i> Eliminar
                                            </a>
                                        @endif
                                        <a class="mx-2 my-auto text-decoration-none" data-bs-toggle="modal" data-bs-target="#editAlmacen" style="cursor: pointer;" onclick="llenarFormAlmacen('{{ $almacen->id }}','{{ $almacen->numero }}','{{ $almacen->tipo }}', '{{ $almacen->descripcion }}');">
                                            <i class="fa fa-edit fa-1x me-2"></i>Editar
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="d-flex my-2">
                    <a class="btn mx-auto ng-white" style="border: 1px solid;" href="{{ route('almacen') }}">Ver mas...</a>
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

                        @if($rol == 1)
                            <div class="my-2 text-primary">
                                <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#addPersona"> <i class="fa fa-plus fa-1x"></i> Crear Usuario</a>
                            </div>
                        @endif

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

                                    @if($rol == 1)
                                        <div class="col-md-12 col-12 d-flex">
                                            <a class="text-danger text-decoration-none my-1 mx-auto delete-button-persona" data-value="{{ $person->id }}" data-bs-toggle="modal" data-bs-target="#deletePersona" style="cursor: pointer;" onclick="setURLDeleteFormPersona(this)">
                                                <i class="fa fa-trash fa-1x me-2"></i> Eliminar
                                            </a>

                                            <a class="mx-auto my-1 text-decoration-none" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#putPersona" onclick="llenarFormPersona('{{ $person->id }}', '{{ $person->nombre }}', '{{ $person->apellido }}', '{{ $person->doc_persona }}', '{{ $person->username }}', '{{ $person->correo }}', '{{ $person->fec_nac }}', '{{ $person->telefono }}', '{{ $person->id_rol }}');">
                                                <i class="fa fa-edit fa-1x me-2"></i> Editar
                                            </a>
                                        </div>
                                    @endif
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
</div> 

@include('almacenes.almacen-create')
@include('almacenes.almacen-edit')
@include('almacenes.almacen-delete')

@include('persons.person-create')
@include('persons.person-edit')
@include('persons.person-delete')

@endsection
