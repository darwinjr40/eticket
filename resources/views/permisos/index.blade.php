@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Permisos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('permisos.create') }}">Crear Permiso</a>
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777eF">
                                    <tr>
                                        <th scope="col" style="color:#fff">Nombre</th>
                                        <th scope="col" style="color: #fff">Acciones</th>
                                    </tr>
                                    
                                </thead>
                                <tbody >
                                    
                                    @foreach ($permission as $per)
                                        <tr>
                                            <td>{{$per->name}}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('permisos.edit', $per->id) }}">Editar</a>
                                                {!! Form::open(['method'=>'DELETE','route'=>['permisos.destroy',$per->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            {{$permission->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection