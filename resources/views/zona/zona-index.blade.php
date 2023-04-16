@extends('layouts.main')

@section('title', 'Zonas')

@section('contenido')

<div class="container my-4 px-md-4">

	<div class="my-3 mx-md-4 text-primary">
        <a class="text-decoration-none" style="cursor: pointer; font-size: 18px!important;" href="/zona/create"> 
    		<i  class="fa fa-plus fa-1x"></i> Agregar Zona
        </a>
    </div>

    <table id="TablaZona" class="table table-bordered table-sm my-3">
        <thead class="thead-dark">
            <tr style="background: white;">
                <th scope="col" class="th-sm px-2">Numero Zona</th>
                <th scope="col" class="th-sm px-2">Numero Almacen</th>
                <th scope="col" class="th-sm px-2">Descripción</th>
                <th scope="col" data-orderable="false" class="th-sm text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
        	@foreach($zonas as $key => $zona)
        		<tr style="background: white;">
        			<th scope="row">{{ $zona->numero }}</th>
        			<td>{{ $zona->almacen }}</td>
        			<td>{{ $zona->descripcion }}</td>
        			<td class="d-flex text-center">
        				<a class="btn btn-primary ms-auto" href="/zona/{{ $zona->id }}/edit"> Editar </a>
                        <form method="POST" class="me-auto ps-1" action="/zona/{{ $zona->id }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
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

	#TablaZona_filter{
    	margin-bottom: 10px;
	}
</style>

<script type="text/javascript">
    $(document).ready(function () {
       $('#TablaZona').DataTable({
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