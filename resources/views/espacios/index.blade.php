@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Espacios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-espacios')
                                <a class="btn btn-primary" href="{{ route('espacios.create') }}"> Crear Espacio</a>
                            @endcan
                            <table class="table table-striped mt-2" style="width: 100%">
                                <thead style="background-color: #6777eF">
                                    <tr>
                                        <th style="color:#fff">Id</th>
                                        <th style="color:#fff">Numero</th>
                                        <th style="color: #fff">Descripcion</th>
                                        <th style="color: #fff">Capacidad</th>
                                        <th style="color:#fff">Acciones</th>
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
                                                @can('editar-espacio')
                                                    <a class="btn btn-info" href="{{ route('espacios.edit', $espacio->id) }}">Editar</a>
                                                @endcan
                                                @can('borrar-espacio')
                                                    {!! Form::open(['method'=>'DELETE','route'=>['espacios.destroy',$espacio->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                            {{$espacios->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection