@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Espacio</h3>
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

                            <form action="{{ route('espacios.update',$espacio->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-users"> Numero</i>
                                                </span>
                                                <input type="text" id="numero" name="numero" class="form-control" value="{{ old('numero',$espacio->numero)}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-blog"> Descripcion</i>
                                                </span>
                                                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion',$espacio->descripcion)}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-bars"> Capacidad</i>
                                                </span>
                                                <input type="number" id="capacidad" name="capacidad" class="form-control" value="{{ old('capacidad',$espacio->capacidad)}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-credit-card"> Precio</i>
                                                </span>
                                                <input type="number" id="precio" name="precio" class="form-control" value="{{ old('capacidad',$espacio->precio)}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Gurardar</button>
                                            <a href="{{route('espacios.index')}}" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>    

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
