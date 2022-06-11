@extends('layouts.logo_app')
@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>Actualizar Informacion</h4></div>

        <div class="card-body pt-1">
            <form action="{{ route('clientes.update',$cliente->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="first_name">Nombre Completo:</label><span
                                    class="text-danger">*</span>
                            <input id="firstName" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name"
                                   tabindex="1" value="{{old('name',$user->name)}}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="email">Email:</label><span
                                    class="text-danger">*</span>
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   name="email" tabindex="1"
                                   value="{{old('email',$user->email)}}"
                                   required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="telefono">Telefono:</label><span
                                    class="text-danger">*</span>
                            <input id="telefono" type="text"
                                   class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                   name="telefono"
                                   tabindex="1"  value="{{old('telefono',$cliente->telefono)}}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('telefono') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{route('clientes.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
