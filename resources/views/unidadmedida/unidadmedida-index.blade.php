@extends('layouts.main')

@section('title', 'Unidades de Medida')

@section('contenido')

<div class="container my-4 px-md-4">

    @if($rol == 2 || $rol == 1)
        <div class="my-3 mx-md-4 text-primary">
            <a class="text-decoration-none" style="cursor: pointer; font-size: 18px!important;" href="/unidadmedida/create"> 
                <i  class="fa fa-plus fa-1x"></i> Crear Unidad de Medida
            </a>
        </div>
    @endif

    <table id="TablaUnidad" class="table table-bordered table-sm my-3">
        <thead class="thead-dark">
            <tr style="background: white;">
                <th scope="col" class="th-sm px-2">Nombre</th>
                <th scope="col" class="th-sm px-2">Tipo</th>
                <th scope="col" class="th-sm px-2">Abreviatura</th>
                <th scope="col" class="th-sm px-2">Producto</th>
                <th scope="col" class="th-sm px-2">Valor</th>
                <th scope="col" data-orderable="false" class="th-sm text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
        	@foreach($unidadmedida as $key => $unidad)
        		<tr style="background: white;">
        			<th scope="row">{{ $unidad->nombre }}</th>
        			<td>{{ $unidad->tipo }}</td>
        			<td>{{ $unidad->abreviatura }}</td>
                    <td>{{ $unidad->id_producto }}</td>
                    <td>{{ $unidad->valor }}</td>
        			<td class="d-flex text-center">
        				<a class="btn btn-primary ms-auto" href="/unidadmedida/{{ $unidad->id }}/edit"> Editar </a>

                        @if($rol == 1)
                            <form method="POST" class="me-auto ps-1" action="/unidadmedida/{{ $unidad->id }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </form>
                        @endif
        			</td>
        		</tr>
        	@endforeach
        </tbody>
    </table>
</div>

<style type="text/css">
	.table-sm > :not(caption) > * > * {
	    padding: 0.5rem 0.5rem;
	}

	#TablaUnidad_filter{
    	margin-bottom: 10px;
	}
</style>

<script type="text/javascript">
    $(document).ready(function () {
       $('#TablaUnidad').DataTable({
            "destroy": true,
            "order": [[ 3, "desc" ]],
            "language": {
                   "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
             }
       });
       $('.dataTables_length').addClass('bs-select');
    });
</script>

@endsection