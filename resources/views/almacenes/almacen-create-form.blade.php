@extends('layouts.main')

@section('title', 'Crear Almacen')

@section('contenido')

<div class="container my-4 px-md-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card font-size-title p-3">
                <form action="/almacen" class="form-group" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-2">
                        <label for="numero">Numero</label>
                        <input type="text" id="numero" name="numero" class="form-control form-control-lg" required>
                    </div>

                    <div class="form-group my-2">
                        <label for="tipo">Tipo</label>
                        <input type="tipo" id="tipo" name="tipo" class="form-control form-control-lg" required>
                    </div>

                    <div class="form-group my-2">
                        <label for="descripcion">Descripción</label>
                        <textarea type="descripcion" id="descripcion" name="descripcion" class="form-control form-control-lg"></textarea>
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