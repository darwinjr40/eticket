@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-15">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-rol')
                                <a class="btn btn-primary" href="{{ route('categoriaEventos.create') }}"> Crear Rol</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777eF">
                                    <th style="color:#fff">Nombre</th>
                                    <th style="color:#fff">Descripcion</th>
                                    <th style="color: #fff">Acciones</th>

                                    
                                </thead>
                                <tbody >
                                    @foreach ($categorias as $cat)
                                        <td>{{$cat->nombre}}</td>
                                        <td>{{$cat->descripcion}}</td>
                                        <td>
                                            @can('editar-categoriaEvento')
                                                <a class="btn btn-info" href="{{ route('categoriaEventos.edit', $cat->id) }}">Editar</a>
                                            @endcan
                                            @can('borrar-categoriaEvento')
                                                {!! Form::open(['method'=>'DELETE','route'=>['categoriaEventos.destroy',$cat->id],'style'=>'diplay:inline']) !!}
                                                    {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                 {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection