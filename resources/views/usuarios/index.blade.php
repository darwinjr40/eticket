@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h3 class="text-center">Dashboard Content</h3> --}}
                            <a class="btn btn-primary" href="{{ route('usuarios.create') }}">Crear Usuario</a>
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777eF">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Nombre</th>
                                    <th style="color:#fff">Email</th>
                                    <th style="color:#fff">Rol</th>
                                    <th style="color:#fff">Acciones</th>
                                    
                                </thead>
                                <tbody >
                                    @foreach ($usuarios as $usuario)
                                        <td style="display:none;">{{$usuario->id}}</td>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>
                                            @if(!empty($usuario->getRoleNames()))
                                                @foreach ($usuario->getRoleNames() as $rolName)
                                                    <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{route('usuarios.edit',$usuario->id)}}">Editar</a>
                                            {!! Form::open(['method'=>'DELETE','route'=>['usuarios.destroy',$usuario->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $usuarios->links() !!}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection