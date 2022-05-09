@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Eventos</h3>
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

                            <form action="{{ route('eventos.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-users"> Titulo</i>
                                                </span>
                                                <input type="text" id="titulo" name="titulo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-bars"> Descripcion</i>
                                                </span>
                                                <textarea name="descripcion" id="descripcion" style="height: 100px;width: 450PX;" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-bars"> Categoria</i>
                                                </span>
                                                <select name="id_categoria" id="id_categoria" class="form-control">
                                                    @foreach ($categorias as $item)
                                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fa fa-bars"> Contacto</i>
                                                </span>
                                                <select name="id_contacto" id="id_contacto" class="form-control">
                                                    @foreach ($contactos as $item)
                                                        <option value="{{$item->id}}">{{$item->nombre}}-{{$item->numero}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="{{route('eventos.index')}}" class="btn btn-danger">Cancelar</a>
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