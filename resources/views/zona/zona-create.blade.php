@extends('layouts.main')

@section('title', 'Crear Zona')

@section('contenido')

<div class="container my-4 px-md-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card font-size-title p-3">
                <form action="/zona" class="form-group" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-2">
                        <label for="numero">Numero</label>
                        <input type="number" id="numero" name="numero" class="form-control form-control-lg" required>
                    </div>

                    <div class="form-group my-2">
                      <label for="id_almacen" class="col-form-label">Asignar un Almacén</label>
                      <select id="id_almacen" name="id_almacen" class="form-select form-select-lg">
                        <option selected>Seleccione un almacén para el producto</option>
                        @foreach($almacenes as $almacen)
                          <option value="{{ $almacen->id }}"> Almacén numero {{ $almacen->numero }}</option>
                        @endforeach
                      </select>
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