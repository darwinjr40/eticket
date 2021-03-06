@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Contacto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- @can('crear-rol')
                            @endcan --}}
                                <a class="btn btn-primary" href="{{ route('contactos.create') }}"> Crear Contacto</a>
                            <table class="table table-striped mt-2" style="width: 100%">
                                <thead style="background-color: #6777eF">
                                    <tr>
                                        <th style="color:#fff">Nombre</th>
                                        <th style="color:#fff">Celular/Telefono</th>
                                        <th style="color: #fff">Correo</th>
                                        <th style="color:#fff">Acciones</th>
                                    </tr> 
                                </thead>
                                <tbody >
                                    @foreach ($contactos as $can)
                                        <tr>
                                            <td>{{$can->nombre}}</td>
                                            <td>{{$can->numero}}</td>
                                            <td>{{$can->email}}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('contactos.edit', $can->id) }}">Editar</a>
                                                    {!! Form::open(['method'=>'DELETE','route'=>['contactos.destroy',$can->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!}

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                            {{$contactos->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection