@extends('layouts.main')

@section('title', 'Crear Marca')

@section('contenido')

<div class="container my-4 px-md-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card font-size-title p-3">
                <form action="/marcas" class="form-group" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-2">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>

                    <div class="form-group my-2">
                        <label for="pais">Pais</label>
                        <input type="pais" id="pais" name="pais" class="form-control" required>
                    </div>

                    <div class="form-group my-2">
                        <label for="descripcion">Descripción</label>
                        <textarea type="descripcion" id="descripcion" name="descripcion" class="form-control"></textarea>
                    </div>

                    <div class="form-group text-center my-4">
                        <button type="submit" class="btn btn-success btn-lg">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection