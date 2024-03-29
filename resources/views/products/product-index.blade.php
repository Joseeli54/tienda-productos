@extends('layouts.main')

@section('title', 'Productos')

@section('contenido')

	<div class="container-fluid my-4 px-md-4">

			@if($rol == 1 || $rol == 2)
				<div class="my-2 mx-md-4 text-primary">
					<a style="cursor: pointer; font-size: 18px!important;" data-bs-toggle="modal" data-bs-target="#addProducto"> 
						<i  class="fa fa-plus fa-1x"></i> Crear Producto
					</a>
				</div>
            @endif


            @if(count($products) > 0)
                <p id="productosEmpty" style="display: none;">No hay productos disponibles...</p>
            @else
                <p id="productosEmpty">No hay productos disponibles...</p>
            @endif

            <div id="contenedorProductos" class="row font-size-page my-3">
				@foreach($products as $product)
					<div class="col-md-3 col-12 my-3">
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
								<div class="text-center my-3">
									{!! QrCode::size(85)->generate('http://127.0.0.1:8000/productos/'.$product->id ) !!}
								</div>

								<div class="d-flex">
								    <a class="btn btn-secondary text-decoration-none mx-auto my-1" href="/productos/{{$product->id }}">
                                        <i class="fa fa-eye fa-1x me-2"></i> Información
                                    </a>
								</div>

								<div class="d-flex">
									<button class="btn btn-primary mx-auto my-1" data-bs-toggle="modal" data-bs-target="#editProducto" 
									onclick="llenarForm('{{ $product->codigo }}','{{ $product->nombre }}','{{ $product->precio }}','{{ $product->tipo }}','{{ $product->moneda }}','{{ $product->descripcion }}','{{ $product->id }}','{{ $product->imagen }}','{{ $product->id_almacen }}', '{{ $product->id_marca }}', '{{ $product->cantidad }}', '{{ $product->id_zona }}');"><i class="fa fa-edit fa-1x me-2"></i> Editar</button>
								</div>

								@if($rol == 1)
									<div class="d-flex">
										<a class="btn btn-danger text-decoration-none mx-auto my-1" data-value="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#deleteProducto" style="cursor: pointer;" onclick="setURLDeleteFormProducto(this)">
											<i class="fa fa-trash fa-1x me-2"></i> Eliminar
										</a>
									</div>
								@endif
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
