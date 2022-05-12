@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Espacios del Sector {{$id_sector}}</h3>
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
                                        <span class="badge badge-danger">{{$error}}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Clase">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('espacios.storeEspacioSector', $id_sector)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-users"> Numero</i>
                                                </span>
                                                <input type="text" id="numero" name="numero" class="form-control">
                                                <span class="input-group-text">
                                                    <i class="fa fa-envelope"> Descripcion</i>
                                                </span>
                                                <input type="text" id="descripcion" name="descripcion" class="form-control">
                                                <span class="input-group-text">
                                                    <i class="fa fa-envelope"> Capacidad</i>
                                                </span>
                                                <input type="number" id="capacidad" name="capacidad" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Agregar Espacio</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped mt-2" style="width: 100%">
                                <thead style="background-color: #6777eF">
                                    <tr>
                                        <th style="color:#fff">Id</th>
                                        <th style="color:#fff">Numero</th>
                                        <th style="color: #fff">Descripcion</th>
                                        <th style="color: #fff">Capacidad</th>
                                        <th style="color:#fff">Accion</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($espacios as $espacio)
                                        <tr>
                                            <td>{{$espacio->id}}</td>
                                            <td>{{$espacio->numero}}</td>
                                            <td>{{$espacio->descripcion}}</td>
                                            <td>{{$espacio->capacidad}}</td>
                                            <td>

                                                <form action="{{ route('espacios.destroy',$espacio->id) }}" method="POST">

                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('espacios.edit', $espacio->id) }}" title="modificar">
                                                        <i class="fa fa-fw fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="eliminar">
                                                        <i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                                {{-- <a class="btn btn-info" href="{{ route('espacios.edit', $espacio->id) }}">Editar</a>
                                                {!! Form::open(['method'=>'DELETE','route'=>['espacios.destroy',$espacio->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!} --}}
                                                {{-- @can('editar-espacio')
                                                @endcan
                                                @can('borrar-espacio')
                                                @endcan --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{$espacios->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

