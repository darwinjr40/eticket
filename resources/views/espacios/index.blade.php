@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Espacios de Sector</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
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
                                                <a class="btn btn-info" href="{{ route('espacios.edit', $espacio->id) }}">Editar</a>
                                                {!! Form::open(['method'=>'DELETE','route'=>['espacios.destroy',$espacio->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                                {{-- @can('editar-espacio')
                                                @endcan
                                                @can('borrar-espacio')
                                                @endcan --}}
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

