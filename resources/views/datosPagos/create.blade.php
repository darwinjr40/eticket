@extends('layouts.cliente')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">Registra los datos de tu Pago</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('datosPagos.storeDatoPago')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('C.I/NIT:') }}</label>
                                <div class="col-md-6">
                                    <input id="ci" type="text" class="form-control" name="ci"
                                        value="{{ old('ci') }}" required autocomplete="ci" placeholder="8747144">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="nombre"
                                        value="{{ old('nombre') }}" required autocomplete="nombre" autofocus
                                        placeholder="Pepito Jimenez">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nro" class="col-md-4 col-form-label text-md-right">{{ __('Celular/Tarjeta:') }}</label>
                                <div class="col-md-6">
                                    <input id="nro" type="text" class="form-control" name="nro"
                                        value="{{ old('nro') }}" required autocomplete="nro" autofocus
                                        placeholder="74125478">
                                </div>
                            </div>
                            {{-- buttons --}}
                            <div class="form-group row mb-0">
                                <div class="col-sm-4">
                                    <button class="btn btn-dark btn-sm" type="submit"><i class="fa fa-credit-card"
                                    aria-hidden="true"></i>Pagar Ahora</button>
                                    <a href="{{ route('tipoPagos.indexTipoPago') }}"
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
