@extends('layouts.main')

@section('title', 'Editar Marca')

@section('contenido')

<div class="container my-4 px-md-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card font-size-title p-3">
                <form action="/unidadmedida/{{ $unidadmedida->id }}" class="form-group" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group my-2">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" value="{{ $unidadmedida->nombre }}" required>
                    </div>

                    <div class="form-group my-2">
                      <label for="tipo" class="col-form-label">Tipo de unidad de medida</label>
                      @foreach($unidades as $key => $valor)
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="item-{{$key}}" value="{{ $valor }}" @php if($unidadmedida->tipo == $valor){ echo "checked"; } @endphp>
                          <label class="form-check-label" for="item-{{$key}}">
                            {{ $valor }}
                          </label>
                        </div>
                      @endforeach
                      <input type="hidden" id="tipo" name="tipo" class="form-control form-control-lg" value="{{ $unidadmedida->tipo }}" required>
                    </div>

                    <div class="form-group my-2">
                      <label for="abreviatura" class="col-form-label">Asignar una abreviatura</label>
                      <select id="abreviatura" name="abreviatura" class="form-select form-select-lg">
                        @foreach($abreviaturas as $key => $abreviatura)
                          <option name="{{ $key }}" value="{{ $abreviatura }}" class="abreviaturas" @php if($unidadmedida->abreviatura == $abreviatura){ echo "selected"; }else{ echo "style='display: none'"; } @endphp> {{ $abreviatura }} </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group my-2">
                      <label for="id_producto" class="col-form-label">Asignar un producto</label>
                      <select id="id_producto" name="id_producto" class="form-select form-select-lg">
                          <option>Seleccione el producto</option>
                        @foreach($productos as $producto)
                            @if($producto->id == $unidadmedida->id_producto)
                                <option value="{{ $producto->id }} " selected> {{ $producto->nombre }} </option>
                            @else
                                <option value="{{ $producto->id }} "> {{ $producto->nombre }} </option>
                            @endif
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group my-2">
                        <label for="valor">Valor</label>
                        <input type="text" id="valor" name="valor" class="form-control form-control-lg" value="{{ $unidadmedida->valor }}" required>
                    </div>

                    <div class="form-group text-center my-4">
                        <button type="submit" class="btn btn-success btn-lg">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $( document ).ready(function() {
        $('input[name="flexRadioDefault"]').on('change', function(e){
            if($(this).is(":checked")){
                //Coloco el tipo de unidad
                $("#tipo").val($(this).val());
                //Desaparezco el resto de las abreviaturas y solo dejo la seleccionada
                $(".abreviaturas").css('display', 'none');
                $('option[name="'+ $(this).val() +'"]').css('display', 'block');

                //Marco tambien en el select la abrev seleccionada.
                $('#abreviatura').val($('option[name="'+ $(this).val() +'"]').val());
            }
        });
    });
</script>

@endsection