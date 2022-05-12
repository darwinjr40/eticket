@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Categoria Eventos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-rol')
                                <a class="btn btn-primary" href="{{ route('categoriaEventos.create') }}"> Crear Categoria</a>
                            @endcan
                            <table class="table table-striped mt-2" style="width: 100%">
                                <thead style="background-color: #6777eF">
                                    <tr>
                                        <th style="color:#fff">Nombre</th>
                                        <th style="color:#fff">Descripcion</th>
                                        <th style="color: #fff">Acciones</th>
                                    </tr> 
                                </thead>
                                <tbody >
                                    @foreach ($categorias as $cat)
                                        <tr>
                                            <td>{{$cat->nombre}}</td>
                                            <td style="text-overflow: ellipsis; overflow: hidden;">{{$cat->descripcion}}</td>
                                            <td>
                                                {{-- @can('editar-categoriaEvento')
                                                @endcan
                                                @can('borrar-categoriaEvento')
                                                @endcan --}}
                                                    <a class="btn btn-info" href="{{ route('categoriaEventos.edit', $cat->id) }}">Editar</a>
                                                    {!! Form::open(['method'=>'DELETE','route'=>['categoriaEventos.destroy',$cat->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                            {{$categorias->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection