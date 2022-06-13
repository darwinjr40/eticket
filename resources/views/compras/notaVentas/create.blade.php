@extends('layouts.cliente')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">Nota de Venta</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('nota-ventas.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="nombre"
                                        value="{{ old('nombre') }}" required autocomplete="nombre" autofocus
                                        placeholder="Ingrese su Nombre">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nit\C.I:') }}</label>

                                <div class="col-md-6">
                                    <input id="nit" type="text" class="form-control" name="nit"
                                        value="{{ old('nit') }}" required autocomplete="nit" placeholder="123456789">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Correo:') }}</label>
                                <div class="col-md-6">
                                    <input id="correo" type="email" class="form-control" name="correo" required
                                        autocomplete="correo" placeholder="example@gmail.com">
                                    @error('correo')  
                                    <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            {{-- oculto --}}
                            <input type="hidden" name="tickets" value="{{ json_encode($tickets) }}">
                            {{-- buttons --}}
                            <div class="form-group row mb-0">
                                <div class="col-sm-4">
                                    <button class="btn btn-dark btn-sm" type="submit">Registrar</button>
                                    <a href="{{ route('tickets.addEvento1') }}"
                                        class="btn btn-danger text-white btn-sm">cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('scripts')
@stop
