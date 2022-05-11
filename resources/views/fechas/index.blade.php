@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Fechas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                             {{-- <a class="btn btn-primary" href="{{ route('fechas.create') }}"> Crear Fechas</a> --}}

                            <table class="table table-striped mt-2" style="width: 100%">
                                <thead style="background-color: #6777eF">
                                    <tr>
                                        <th style="color:#fff">ID</th>
                                        <th style="color:#fff">DateTime</th>
                                        <th style="color:#fff">Ubicacion</th>
                                        <th style="color: #fff">Acciones</th>
                                    </tr> 
                                </thead>
                                <tbody >
                                    @foreach ($fechas as $sec)
                                        <tr>
                                            <td>{{$sec->id}}</td>
                                            <td>{{$sec->fechaHora}}</td>
                                            <td>{{$sec->id_ubicacion}}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('fechas.edit', $sec->id) }}">Editar</a>
                                                    {!! Form::open(['method'=>'DELETE','route'=>['fechas.destroy',$sec->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                            {{$fechas->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection