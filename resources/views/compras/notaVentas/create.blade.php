@extends('layouts.cliente')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('nota-ventas.store') }}" method="POST">
                @csrf
                <br>
                <div class="row">
                    <div class="col-sm-12" style="margin-bottom: 2%">
                            <h3 style="margin-left: 35%">Nota de Venta</h5>
                    </div>
                    {{-- <div class="col-sm-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" value="" name="" class="form-control" placeholder="nombre" readonly>
                    </div>

                    <div class="col-sm-3">
                        <label for="jurisdiccion">Edad:</label>
                        <input type="text" value="" name="" class="form-control" placeholder="nombre" readonly>

                    </div>
                    <div class="col-sm-3">
                        <label for="tipo">Genero:</label>
                        <input type="text" value="" name="" class="form-control" placeholder="nombre" readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="tipo">Especialista</label>
                        <input type="text" value="" name="" class="form-control" placeholder="nombre" readonly>

                    </div>

                    <div class="col-sm-6">
                        <label for="tipo">Servicio:</label>
                        <input type="text" value="" name="" class="form-control" placeholder="servicio" readonly>
                        <br>
                    </div> --}}

                    <div class="col-sm-4">
                        <label for="tipo">Nombre:</label>
                        <input type="text" value="{{ old('Nombre') }}" name="presion" class="form-control"
                            placeholder="Ingrese su nombre completo">
                        <br>
                    </div>

                    <div class="col-sm-4">
                        <label for="tipo">Nit\C.I:</label>
                        <input type="text" value="{{ old('Nit\C.I') }}" name="temperatura" class="form-control"
                            placeholder="123456789">
                        <br>
                    </div>

                    <div class="col-sm-4">
                        <label for="tipo">Correo:</label>
                        <input type="text" value="{{ old('Correo') }}" name="pulso" class="form-control"
                            placeholder="example@gmail.com">
                        <br>
                    </div>

                    {{-- oculto --}}
                    <input type="hidden" name="tickets" value="{{ json_encode($tickets) }}">
                    {{-- buttons --}}
                    <div class="col-sm-3">
                        <button class="btn btn-danger btn-sm" type="submit">Registrar</button>
                        <a href="{{route('tickets.addEvento1')}}"class="btn btn-warning text-white btn-sm">cancelar</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('scripts')
    <script>
        console.log('Hi!');
    </script>
@stop
