@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Datos de los Pagos Registrados</h3>
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
                                        <th style="color:#fff">CI</th>
                                        <th style="color: #fff">Nombre</th>
                                        <th style="color: #fff">Celular-Tarjeta</th>
                                        <th style="color: #fff">Estado</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($datoPagos as $datoPago)
                                        <tr>
                                            <td>{{$datoPago->id}}</td>
                                            <td>{{$datoPago->ci}}</td>
                                            <td>{{$datoPago->nombre}}</td>
                                            <td>{{$datoPago->nro}}</td>
                                            <td>{{$datoPago->estado}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$datoPagos->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

