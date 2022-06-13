@extends('layouts.cliente')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">Metodo de Pago</div>

                    <div class="card-body">
                        <form action="{{ route('datosPagos.create') }} ">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-bars"> Metodo de Pagos:</i>
                                    </span>
                                    <select name="id_tipoPago" id="id_tipoPago" class="form-control">
                                        @foreach ($tipoPagos as $item)
                                            <option value="{{ $item->id }}">{{ $item->forma }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- buttons --}}
                            <div class="form-group row mb-0">
                                <div class="col-sm-4">
                                    <button class="btn btn-dark btn-sm" type="submit">Elegir</button>
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
