@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Categoria de Eventos</h3>
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

                            <form action="{{ route('categoriaEventos.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-users"> Nombre</i>
                                                </span>
                                                <input type="text" id="nombre" name="nombre" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-users"> Descripcion</i>
                                                </span>
                                                <textarea name="descripcion" id="descripcion" style="height: 100px;width: 450PX;"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="{{route('categoriaEventos.index')}}" class="btn btn-danger">Cancelar</a>
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