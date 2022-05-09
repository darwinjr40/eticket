@extends('layouts.app')

{{-- @section('template_title')
    Ubicacion
@endsection --}}

@section('content')

<div class="card">
    <div class="card-body">
        <!--Modal para agregar archivos -->
                <div class="jumbtron jumbotron-fluid">
                    <div class="container">
                        <h3 >Gestor de Imagenes</h3>

                        <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarArchivos">
                            <span class="fas fa-plus-circle"></span>                            
                            {{-- <span class="fas fa-fw fa-plus"></span>                                                         --}}
                            Imagenes
                        </span>
                        <hr>
                    </div>
            
            
                    <div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
            
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Imagen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
            
                                <div class="modal-body">
            
                                    <form id="frmArchivos" action="{{ route('imagens.store') }}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf
                                        <input type="file" name="files[]" id="archivos" multiple required>
            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                            <button type="submit" class="btn btn-primary">guardar</button>
                                        </div>
            
                                    </form>
            
                                </div>
            
            
            
                            </div>
                        </div>
                    </div>
                </div>
           <!-- Fin Modal para agregar archivos -->
            <div class="row">
                <div class="col-sm-12">

                    <table class="table table-striped" id="imagenes" border="5">
                        <thead class="thead" style="background-color: #6777eF">
                            <tr >
                                <th style="color:#fff">Nro</th>
                                <th style="color:#fff">url</th>
                                <th style="color:#fff">acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{ $file->id }}</td>
                                    <td>{{ $file->path }}</td>

                                    <td>
                                        <form action="{{ route('imagens.destroy', $file) }}" method="POST">
                                            <a class="btn btn-sm btn-primary" href="{{ ($file->path) ? $file->path : '#' }}"><i class="fa fa-fw fa-eye"></i></a>  
                                            {{-- <a class="btn btn-sm btn-success" href="{{ route('imagens.edit', $file) }}"><i
                                                    class="fa fa-fw fa-edit"></i> </a> --}}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
                {{-- {!! $files->links() !!} --}}
            </div>
        </div>
    </div>
@endsection


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@stop

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
            $('#imagenes').DataTable({
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