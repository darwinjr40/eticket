@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Eventos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Clase">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-users"> Titulo</i>
                                                </span>
                                                <input type="text" id="titulo" name="titulo" class="form-control"
                                                    value="{{ old('titulo', $evento->titulo) }}"">
                                                </div>
                                            </div>
                                            <div class=" form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-bars"> Descripcion</i>
                                                    </span>
                                                    <textarea name="descripcion" id="descripcion" style="height: 100px;width: 450PX;" class="form-control">
                                                {{ $evento->descripcion }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-bars"> Estado</i>
                                                    </span>
                                                    <select name="estado" id="estado" class="form-control">
                                                        <option value="{{ $evento->estado }}">
                                                            {{ old('estado', $evento->estado) }}</option>
                                                        <option value="inicio">Inicio</option>
                                                        <option value="proceso">Proceso</option>
                                                        <option value="fin">Fin</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-bars"> Categoria</i>
                                                    </span>
                                                    <select name="id_categoria" id="id_categoria" class="form-control">
                                                        @foreach ($categorias as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-bars"> Contacto</i>
                                                    </span>
                                                    <select name="id_contacto" id="id_contacto" class="form-control">
                                                        @foreach ($contactos as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->nombre }}-{{ $item->numero }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                <a href="{{ route('eventos.index') }}" class="btn btn-danger">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <div class="card">
        <div class="card-body">
            <!--Modal para agregar archivos -->
            <div class="jumbtron jumbotron-fluid">
                <h3 style="text-align: center">Lista de Ubicaciones</h3>
                <div style="margin-bottom: 10px">
                    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarUbicaciones">
                        {{-- <span class="fas fa-plus-circle"></span> --}}
                        <span class="fas fa-fw fa-plus"></span>
                        Ubicaciones
                    </span>
                </div>


                <div class="modal fade" id="modalAgregarUbicaciones" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Crear Ubicacion</h5>
                                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>xd
                                    </button> --}}
                            </div>

                            <div class="modal-body">

                                <form id="frmArchivos" action="{{ route('ubicacions.store') }}"
                                    enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-users"> Nombre</i>
                                            </span>
                                            <input type="text" id="titulo" name="nombre" class="form-control""">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-users"> Direccion</i>
                                            </span>
                                            <input type="text" id="titulo" name="direccion" class="form-control""">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-users"> Telefono</i>
                                            </span>
                                            <input type="text" id="titulo" name="telefono" class="form-control""">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-users"> capacidad</i>
                                            </span>
                                            <input type="text" id="titulo" name="capacidad" class="form-control""">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('ubicacion') }}
                                        <div id="map" style="width: 100%; height: 500px;"></div>
                                    </div>
                                    {{-- ocultos --}}
                                    <input id="latitud" name="latitud" type="hidden" value="-17.783290">
                                    <input id="longitud" name="longitud" type="hidden" value="-63.182073">
                                    <input id="" name="evento_id" type="hidden" value="{{ $evento->id }}">
                                    {{-- Fin ocultos --}}
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

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif


                <div class="col-sm-12">
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
                                    <td>{{ $ubicacion->id }}</td>

                                    <td>{{ $ubicacion->nombre }}</td>
                                    <td>{{ $ubicacion->direccion }}</td>
                                    <td>{{ $ubicacion->telefono }}</td>
                                    <td>{{ $ubicacion->capacidad }}</td>
                                    {{-- <td>{{ $ubicacion->latitud }}</td>
                                    <td>{{ $ubicacion->longitud }}</td> --}}

                                    <td>
                                        <form action="{{ route('ubicacions.destroy', $ubicacion->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('ubicacions.show', $ubicacion->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> </a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('ubicacions.edit', $ubicacion->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> </a>
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
                <hr>

                </div>



                {{-- !--Modal para agregar archivos --> --}}
                <div class="jumbtron jumbotron-fluid">
                    {{-- <div class="container"> --}}
                        <h3 style="text-align: center" >Lista de fotos</h3>
                        <div style="margin-bottom: 10px">
                            <span style="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarArchivos">
                                {{-- <span class="fas fa-plus-circle"></span>                             --}}
                                <span class="fas fa-fw fa-plus"></span>                                                        
                                Imagenes
                            </span>
                        </div>

                    {{-- </div> --}}
            
            
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
                                        <br>
                                        <br>
                                        <input id="" name="evento_id" type="hidden" value="{{ $evento->id }}">
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
                {{-- Imagenes --}}
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
                {{-- Fin Imagenes --}}

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
    {{-- maps --}}
    <script type="text/javascript" src="{{ asset('js/map/mapa2.js') }}"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
    {{-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUexPfr0cJLlaF08zCb1X3aggukbaIAI&callback=initMap"></script> --}}
    {{-- Fin maps --}}
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
                "order": [
                    [0, "desc"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_  registros por pagina",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ regsitros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
        
        $(document).ready(function() {
            $('#imagenes').DataTable({
                responsive: true,
                autoWidth: false,
                "order": [
                    [0, "desc"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_  registros por pagina",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ regsitros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
@stop
