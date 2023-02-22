@extends('layouts.main')

@section('title', 'Productos')

@section('contenido')

	<div class="container-fluid my-4 mx-md-5">
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
								<h6> {{ $product->tipo }}</h6>
								<h6> Codigo #{{ $product->codigo }} </h6>
								<h6> {{ $product->precio }} {{ $product->moneda }}</h6>

								<p>{{ $product->descripcion }}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
	</div>

	@include('products.product-create')

@endsection
