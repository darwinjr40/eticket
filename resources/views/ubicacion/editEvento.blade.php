@extends('layouts.app')

@section('template_title')
    Update Ubicacion
@endsection

@section('content')
    <section class="section">
        
        <div class="section-header">
            <h3 class="page__heading">Actualizar Ubicacion</h3>
        </div>

        <div class="">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('ubicacions.update', $ubicacion['id']) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('ubicacion.form')
                            {{-- ocultos --}}
                            <input id="" name="evento_id" type="hidden" value="{{ $ubicacion['evento_id'] }}">
                            {{-- Fin ocultos --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="card-body">
            <!--Modal para agregar Fechas -->
            <div class="jumbtron jumbotron-fluid">
                <h3 style="text-align: center">Lista de Fechas</h3>
                <div style="margin-bottom: 10px">
                    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarFecha">
                        {{-- <span class="fas fa-plus-circle"></span> --}}
                        <span class="fas fa-fw fa-plus"></span>
                        Fechas
                    </span>
                </div>


                <div class="modal fade" id="modalAgregarFecha" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Crear Fecha</h5>
                                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>xd
                                    </button> --}}
                            </div>

                            <div class="modal-body">

                                <form id="frmArchivos" action="{{ route('fechas.store') }}" enctype="multipart/form-data"
                                    method="post">
                                    @csrf

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"> Fecha y Hora</i>
                                            </span>
                                            <input type="datetime-local" id="fechaHora" name="fechaHora"
                                                class="form-control" value="{{Date('Y-m-d\TH:i',time())}}">
                                        </div>
                                    </div>
                                    {{-- oculto --}}
                                    <input id="id_ubicacion" name="id_ubicacion" type="hidden"
                                        value="{{ $ubicacion['id'] }}">

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                <table class="table table-striped mt-2">
                    <thead style="background-color: #6777eF">
                        <tr>
                            <th scope="col" style="color:#fff">ID</th>
                            <th scope="col" style="color:#fff">DataTime</th>
                            <th scope="col" style="color: #fff">Acciones</th>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($fechas as $per)
                            <tr>
                                <td>{{ $per->id }}</td>
                                <td>{{ $per->fechaHora }}</td>
                                <td>
                                    <form action="{{ route('fechas.destroy', $per->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('fechas.edit', $per->id) }}"
                                            title="modificar">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger btn-sm" title="eliminar">
                                            <i class="fa fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                                    {{-- <a class="btn btn-info" href="{{ route('fechas.edit', $per->id) }}">Editar</a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['fechas.destroy', $per->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Borrar', ['Class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!} --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const coordenada = {
            lat: {{ $ubicacion['latitud'] }},
            lng: {{ $ubicacion['longitud'] }}
        };
    </script>
    <script type="text/javascript" src="{{ asset('js/map/mapa2.js') }}"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
    {{-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUexPfr0cJLlaF08zCb1X3aggukbaIAI&callback=initMap"></script> --}}
@endsection
