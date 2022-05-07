@extends('layouts.app')

{{-- @section('template_title')
    Ubicacion
@endsection --}}

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <div class="col-sm-8">
                                <span id="card_title" >
                                    {{ __('Ubicacion') }}
                                </span>
                            </div>

                             <div class="float-right">
                                <a href="{{ route('ubicacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fa fa-fw fa-plus"></i>  
                                    {{-- {{ __('Crear') }} --}}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="ubicaciones" border="3">
                                <thead class="thead">
                                    <tr>
                                        <th>Nro</th>
										<th>Nombre</th>
										<th>Direccion</th>
										<th>Telefono</th>
										<th>Capacidad</th>
										{{-- <th>Latitud</th>
										<th>Longitud</th> --}}

                                        <th>acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ubicacions as $ubicacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ubicacion->nombre }}</td>
											<td>{{ $ubicacion->direccion }}</td>
											<td>{{ $ubicacion->telefono }}</td>
											<td>{{ $ubicacion->capacidad }}</td>
											{{-- <td>{{ $ubicacion->latitud }}</td>
											<td>{{ $ubicacion->longitud }}</td> --}}

                                            <td >
                                                <form action="{{ route('ubicacions.destroy',$ubicacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ubicacions.show',$ubicacion->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ubicacions.edit',$ubicacion->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ubicacions->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
            $('#ubicaciones').DataTable({
                responsive: true,
                autoWidth: false,
                "order": [[ 0, "desc" ]],
                "language": {
                    "lengthMenu": "Mostrar _MENU_  registros por pagina",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de _MAX_ regsitros totales)",
                    "search" : "Buscar:",
                    "paginate" : {
                        "next" : "Siguiente",
                        "previous" : "Anterior"
                     }
                }
            });
        });
</script>
@stop


