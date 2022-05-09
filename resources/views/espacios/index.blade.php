@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Espacios del Sector {}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{$error}}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Clase">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('espacios.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-users"> Numero</i>
                                                </span>
                                                <input type="text" id="numero" name="numero" class="form-control">
                                                <span class="input-group-text">
                                                    <i class="fa fa-envelope"> Descripcion</i>
                                                </span>
                                                <input type="text" id="descripcion" name="descripcion" class="form-control">
                                                <span class="input-group-text">
                                                    <i class="fa fa-envelope"> Capacidad</i>
                                                </span>
                                                <input type="number" id="capacidad" name="capacidad" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Agregar Espacio</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped mt-2" style="width: 100%">
                                <thead style="background-color: #6777eF">
                                    <tr>
                                        <th style="color:#fff">Id</th>
                                        <th style="color:#fff">Numero</th>
                                        <th style="color: #fff">Descripcion</th>
                                        <th style="color: #fff">Capacidad</th>
                                        <th style="color: #fff">sector id</th>
                                        <th style="color:#fff">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody >
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

