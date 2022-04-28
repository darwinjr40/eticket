@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-rol')
                                <a class="btn btn-primary" href="{{ route('roles.create') }}"> Crear Rol</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777eF">
                                    <th style="color:#fff">Rol</th>
                                    <th style="color:#fff">Acciones</th>

                                    
                                </thead>
                                <tbody >
                                    @foreach ($roles as $rol)
                                        <td>{{$rol->name}}</td>
                                        <td>
                                            @can('editar-rol')
                                                <a class="btn btn-info" href="{{ route('roles.edit', $rol->id) }}">Editar</a>
                                            @endcan
                                            @can('borrar-rol')
                                                {!! Form::open(['method'=>'DELETE','route'=>['roles.destroy',$rol->id],'style'=>'diplay:inline']) !!}
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
