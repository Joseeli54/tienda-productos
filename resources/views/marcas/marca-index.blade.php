@extends('layouts.main')

@section('title', 'Marcas')

@section('contenido')

<div class="container my-4 px-md-4">

    @if($rol == 1 || $rol == 2)
        <div class="my-3 mx-md-4 text-primary">
            <a class="text-decoration-none" style="cursor: pointer; font-size: 18px!important;" href="/marcas/create"> 
                <i  class="fa fa-plus fa-1x"></i> Crear Marca
            </a>
        </div>
    @endif

    <table id="TablaMarca" class="table table-bordered table-sm my-3">
        <thead class="thead-dark">
            <tr style="background: white;">
                <th scope="col" class="th-sm px-2">Nombre</th>
                <th scope="col" class="th-sm px-2">Pais</th>
                <th scope="col" class="th-sm px-2">Descripción</th>
                <th scope="col" data-orderable="false" class="th-sm text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
        	@foreach($marcas as $key => $marca)
        		<tr style="background: white;">
        			<th scope="row">{{ $marca->nombre }}</th>
        			<td>{{ $marca->pais }}</td>
        			<td>{{ $marca->descripcion }}</td>
        			<td class="d-flex text-center">
        				<a class="btn btn-primary ms-auto" href="/marcas/{{ $marca->id }}/edit"> Editar </a>
                        @if($rol == 1)
                            <form method="POST" class="me-auto ps-1" action="/marcas/{{ $marca->id }}">
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

	#TablaMarca_filter{
    	margin-bottom: 10px;
	}
</style>

<script type="text/javascript">
    $(document).ready(function () {
       $('#TablaMarca').DataTable({
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