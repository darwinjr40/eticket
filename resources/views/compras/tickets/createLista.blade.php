@extends('layouts.app')

{{-- @section('template_title')
    Create Ubicacion
@endsection --}}

@section('content')
    {{-- <section class="section"> --}}
    {{-- <div class="section-header">
            <h3 class="page__heading">Seleccion Ubicacion</h3>
        </div> --}}
    {{-- <div class="row">
            <div class="col-md-12"> --}}
    <div class="card">
        <div class="card-body">
            <div class="row row justify-content-center m-2">
                <h2 class="font-weight-bold">Seleccione la Ubicacion</h2>
            </div>
            <br> <br>
            <form method="POST" action="{{ route('tickets.addEvento') }}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row row justify-content-center">
                {{-- SELECT UBICACION --}}
                    <div class="col-3">
                        <select name="ubicacion_id" id="select-ubicaciones" class="form-control" autofocus required>
                            <option value="">Seleccionar Ubicacion</option>
                            @foreach ($ubicaciones as $ubicacion)
                                <option value="{{ $ubicacion['id'] }}">{{ $ubicacion['nombre'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- SELECT FECHA --}}
                    <div class="col-3">
                        <select name="fecha_id" id="select-fechas" class="form-control" required>
                            <option value="">Seleccionar Fecha</option>
                        </select>
                    </div>
                    {{-- INPUT CANTIDAD --}}
                    <div class="col-3 ">
                        <div class="form-group input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-arrow-up"> cantidad</i>
                                </span>
                                <input type="number" value="1" name="cantidad" class="  form-control" min="1" max="50">
                        </div>
                        {{-- @error('cantidad')
                        <p>DEBE INGRESAR LA CANTIDAD</p>
                        @enderror --}}
                    </div>
                    {{-- BUTTON AÑADIR --}}
                    <div class="col-3 align-items-center" style="">
                        {{-- <button  class="btn btn-primary type="submit">Comprar Ticket</button> --}}
                        <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Añadir</button>
                        
                    </div>
                    {{-- oculto --}}
                    <input type="hidden" name="tickets"  value="{{json_encode($tickets)}}">
                </div>
                </form>

            <div class="row">
                <div class="col-sm-9" style="">
                    
                </div>

                <div class="col-sm-2" style="">
                    <form method="POST" action="{{ route('nota-ventas.crear') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        <button class="btn  btn-dark " type="submit"><i class="fa fa-credit-card" aria-hidden="true"></i> Pagar ahora</button>
                        {{-- oculto --}}
                        <input type="hidden" name="tickets"  value="{{json_encode($tickets)}}">
                        <input type="hidden" name="ubicacion_id"  value="">
                    </form>
                </div>
            </div>
            {{-- tabla --}}
            <div class="row row justify-content-center m-2">
                <h2 class="font-weight-bold">Detalles de la compra</h2>
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Ubicacion</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">cantidad</th>
                            <th scope="col">precio</th>
                            <th scope="col">importe</th>
                            <th scope="col" width='3%'></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket['id'] }}</td>
                                <td>{{ $ticket['ubicacion'] }}</td>
                                <td>{{ $ticket['fecha'] }}</td>
                                <td>{{ $ticket['cantidad'] }}</td>
                                <td>{{ $ticket['precio'] }}</td>
                                <td>{{ $ticket['precio'] * $ticket['cantidad'] }}</td>
                                <td>
                                    <form method="POST" action="{{ route('tickets.destroyEvento', $ticket['id']) }}" role="form" enctype="multipart/form-data">
                                        @csrf
                                        {{-- oculto --}}
                                        <input type="hidden" name="tickets"  value="{{json_encode($tickets)}}">
                                        {{-- button --}}
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">
                                            <i class="fas fa-times"></i>

                                        </button>
                                    </form>
                                    {{-- <form action="{{ route('salidas.destroyDetalle', $salida, $detalle->id) }}" method="post"> --}}
                                    {{-- <form  action="{{ route('salidas.update', $salida) }}" method="POST"> --}}
                                    {{-- {!! Form::model("EliminarDetalle", ['route' => ['salidas.update', $salida], 'method' => 'put']) !!}
                                    @csrf
                                    <button name="productoId" value={{$detalle->id}} class="btn btn-danger btn-sm"  > <i class="fas fa-times"></i>  </button>
                                {!! Form::close() !!} --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    {{-- </div>
        </div> --}}
    {{-- </section> --}}
@endsection


@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/Ubicacion/estilos.css') }}"> --}}
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/path.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ticket/combo.js') }}"></script>
@stop
