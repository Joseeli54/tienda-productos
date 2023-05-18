@extends('layouts.main')

@section('title', 'Producto')

@section('contenido')

 <img id="imagen-carta2" style="margin-top: 20px; 
  								 width: 200px; 
  								 height: 200px"
	   class="card-img-top rounded-circle mx-auto d-block"
	   src="{{asset('insertado/producto/'.$product->imagen)}}" 
	   alt="">

<div class="container text-center">
	<div class="text-center">

	    <h1 >{{$product->nombre}}</h1> <p></p>
	    <span > <b> Cod: </b> {{ $product->codigo }}</span> <br>
	    <span > <b> Tipo: </b> {{ $product->tipo }}</span> <br>
	    <span > <b> Precio: </b>{{ $product->precio }} {{ $product->moneda }}</span> <br>
	    <span > <b> Unidades: </b> {{ $product->cantidad }} </span> <br>
	    <span > <b> Estado: </b> {{ $product->estado }} </span> <br>
	    <span> <b> Marca: </b> {{$product->marca }} </span> <br>
	    <span> Ubicado en el almacen numero {{$product->numero }} </span>

	    <div > <p>{{$product->descripcion}}</p></div>

	    <hr>
	    <h1> Medidas del Producto </h1>
	    @foreach($unidadmedida as $unidad)
		    <div class="my-3">
		    	<span > <b>{{ $unidad->nombre }}</b> </span> <br>
		    	<span >  {{ $unidad->tipo }}</span>
		    	<span > {{ $unidad->valor }} {{ $unidad->abreviatura }}</span>
		    </div>
	    @endforeach

	</div>
	
	<div class="d-flex">
		@if($rol == 2)
			<a class="btn btn-primary btn-lg botoncito ms-auto me-2" data-bs-toggle="modal" data-bs-target="#editProducto"
			onclick="llenarForm('{{ $product->codigo }}','{{ $product->nombre }}','{{ $product->precio }}','{{ $product->tipo }}','{{ $product->moneda }}','{{ $product->descripcion }}','{{ $product->id }}','{{ $product->imagen }}','{{ $product->id_almacen }}', '{{ $product->id_marca }}', '{{ $product->cantidad }}');"><i class="fa fa-edit fa-1x me-2"></i> Actualizar</a>
        @endif

		@if($rol == 1)
			<a class="btn btn-danger btn-lg text-decoration-none me-auto" data-value="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#deleteProducto" style="cursor: pointer;" onclick="setURLDeleteFormProducto(this)">
				<i class="fa fa-trash fa-1x me-2"></i> Eliminar
			</a>
		@endif
    </div>
</div>

@include('products.product-create')
@include('products.product-edit')
@include('products.product-delete')

@endsection
