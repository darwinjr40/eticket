@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tipos de Pago</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('tipoPagos.create') }}"> Crear Tipo de Pago</a>
                            <table class="table table-striped mt-2" style="width: 100%">
                                <thead style="background-color: #6777eF">
                                    <tr>
                                        <th style="color:#fff">Id</th>
                                        <th style="color:#fff">Forma</th>
                                        <th style="color:#fff">Accion</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($tipoPagos as $tipoPago)
                                        <tr>
                                            <td>{{$tipoPago->id}}</td>
                                            <td>{{$tipoPago->forma}}</td>
                                            <td>
                                                <a class="btn btn-warning" href="{{ route('datosPagos.indexPago', $tipoPago->id) }}"> Ver Datos de Pago</a>
                                                <a class="btn btn-info" href="{{ route('tipoPagos.edit', $tipoPago->id) }}">Editar</a>
                                                {!! Form::open(['method'=>'DELETE','route'=>['tipoPagos.destroy',$tipoPago->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar',['Class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$tipoPagos->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

