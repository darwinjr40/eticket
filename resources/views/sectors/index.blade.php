@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Sectores</h3>
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
                                        <th style="color: #fff">Capacidad</th>
                                        <th style="color: #fff">Capacidad disponible</th>
                                        <th style="color: #fff">Precio</th>
                                        
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
                                            <td>{{$sector->capacidad_disponible}}</td>
                                            <td>{{$sector->precio}}</td>
                                            
                                            <td>{{$sector->referencia}}</td>
                                            <td>
                                                {{-- @can('agregar-espacio')
                                                @endcan
                                                @can('editar-sector')
                                                @endcan
                                                @can('borrar-sector')
                                                @endcan --}}
                                                    <a class="btn btn-warning" href="{{ route('espacios.indexSector', $sector->id) }}"> Ver Espacios</a>
                                                    <a class="btn btn-info" href="{{ route('sectors.edit', $sector->id) }}">Editar</a>
                                                    {!! Form::open(['method'=>'DELETE','route'=>['sectors.destroy',$sector->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {{$sectors->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
