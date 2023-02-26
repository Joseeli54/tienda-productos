@extends('layouts.main')

@section('title', 'Productos')

@section('contenido')

	<div class="container my-4 mx-md-5">
    		<div class="my-2 text-primary">
                <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#addProducto"> 
            		<i  class="fa fa-plus fa-1x"></i> Crear Producto
                </a>
            </div>

            @if(count($products) > 0)
                <p id="productosEmpty" style="display: none;">No hay productos disponibles...</p>
            @else
                <p id="productosEmpty">No hay productos disponibles...</p>
            @endif

            <div id="contenedorProductos" class="row font-size-page my-3">
				@foreach($products as $product)
					<div class="col-md-3 col-12">
						<div class="card">
							<div class="card-header text-center">
								<h3>{{ $product->nombre }}</h3>
							</div>

							<div class="card-body text-center">
								<div class="text-center my-3">
									<img src="{{ asset('insertado/producto/'.$product->imagen) }}" height="100" width="100">
								</div>
								<h6><b>{{ $product->tipo }}</b></h6>
								<h6>Codigo <b>#{{ $product->codigo }}</b> </h6>
								<h6><b> {{ $product->precio }} {{ $product->moneda }} </b></h6>
								<p>{{ $product->descripcion }}</p>

								<div class="d-flex">
									<button class="btn btn-primary mx-auto my-1" data-bs-toggle="modal" data-bs-target="#editProducto" onclick="llenarForm({{ json_encode($product) }});"><i class="fa fa-edit fa-1x me-2"></i> Editar</button>
								</div>

								<div class="d-flex">
								    <a class="btn btn-danger text-decoration-none mx-auto my-1" data-value="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#deleteProducto" style="cursor: pointer;" onclick="setURLDeleteFormProducto(this)">
                                        <i class="fa fa-trash fa-1x me-2"></i> Eliminar
                                    </a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
	</div>

	@include('products.product-create')
	@include('products.product-edit')
	@include('products.product-delete')

@endsection
