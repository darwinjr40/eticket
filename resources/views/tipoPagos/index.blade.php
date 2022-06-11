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
                            <table class="table table-striped mt-2" style="width: 100%">
                                <thead style="background-color: #6777eF">
                                    <tr>
                                        <th style="color:#fff">Id</th>
                                        <th style="color:#fff">Forma</th>
                                        <th style="color: #fff">Monto</th>
                                        <th style="color: #fff">Fecha</th>
                                        <th style="color:#fff">Accion</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

