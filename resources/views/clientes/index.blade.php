@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Clientes de la Pagina</h3>
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
                                        <th style="color:#fff">Nombre</th>
                                        <th style="color: #fff">Correo</th>
                                        <th style="color: #fff">Telefono</th>
                                        <th style="color:#fff">Accion</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{$cliente->id}}</td>
                                            <td>{{$cliente->user->name}}</td>
                                            <td>{{$cliente->user->email}}</td>
                                            <td>{{$cliente->telefono}}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                                                {!! Form::open(['method'=>'DELETE','route'=>['clientes.destroy',$cliente->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$clientes->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

