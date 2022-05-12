@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Sectores de la Ubicacion {{ $id_ubicacion }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
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
                                <form action="{{ route('sectors.storeUbicacionSector',$id_ubicacion) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-users"> Nombre</i>
                                                        </span>
                                                        <input type="text" id="nombre" name="nombre" class="form-control">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-envelope"> Capacidad</i>
                                                        </span>
                                                        <input type="number" id="capacidad" name="capacidad" class="form-control">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-lock"> Referencia</i>
                                                        </span>
                                                        <input type="text" id="referencia" name="referencia" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Agregar Sector</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <table class="table table-striped mt-2" style="width: 100%">
                                <thead style="background-color: #6777eF">
                                    <tr>
                                        <th style="color:#fff">Id</th>
                                        <th style="color:#fff">Nombre</th>
                                        <th style="color: #fff">Capacidad</th>
                                        <th style="color: #fff">Referencia</th>
                                        <th style="color:#fff">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($sectors as $sector)
                                        <tr>
                                            <td>{{$sector->id}}</td>
                                            <td>{{$sector->nombre}}</td>
                                            <td>{{$sector->capacidad}}</td>
                                            <td>{{$sector->referencia}}</td>
                                            <td>
                                                {{-- @can('agregar-espacio')
                                                @endcan
                                                @can('editar-sector')
                                                @endcan
                                                @can('borrar-sector')
                                                @endcan --}}
                                                <form action="{{ route('sectors.destroy',$sector->id) }}" method="POST">
                                            
                                                    <a class="btn btn-sm btn-primary"
                                                    href="{{ route('espacios.indexSector', $sector->id) }}"><i
                                                        class="fas fa-fw fa-plus"
                                                        title="add espacios"></i> 
                                                    </a>
        
        
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('sectors.edit', $sector->id) }}"
                                                        title="modificar">
                                                        <i class="fa fa-fw fa-edit"></i> 
                                                    </a>
        
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="eliminar">
                                                        <i class="fa fa-fw fa-trash"></i> 
                                                    </button>
                                                </form>
                                                {{-- <a class="btn btn-warning" href="{{ route('espacios.indexSector', $sector->id) }}"> Agregar Espacios</a>
                                                    <a class="btn btn-info" href="{{ route('sectors.edit', $sector->id) }}">Editar</a>
                                                    {!! Form::open(['method'=>'DELETE','route'=>['sectors.destroy',$sector->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!} --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {{-- {{$sectors->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
