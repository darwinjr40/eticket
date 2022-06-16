@extends('layouts.cliente')

{{-- @section('template_title')
    Create Ubicacion
@endsection --}}

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

                <div class="card-header ">
                    <h4 class="font-weight-bold">Seleccione la Ubicacion</h4>
                </div>

                <div id="contenidoSuperior" class="card-body">
                    {{-- message --}}
                    @if (isset($error))
                        <div class="alert alert-danger">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endif

                    @if (isset($success))
                        <h1>precio</h1>
                        <div class="alert alert-dark">
                            <strong>{{ $success }}</strong>
                        </div>
                    @endif
                    {{-- izquierda --}}
                    <section id="izquierda" class="caja">

                        <img class="izquierdaClass"
                            src="{{$imagenes[0]['path']}}">
                            {{-- src="https://w7.pngwing.com/pngs/981/736/png-transparent-logo-clinic-family-medicine-physician-family-walk-text-trademark-logo.png"> --}}


                        <div id="map" class="izquierdaClass"></div>
                    </section>

                    {{-- derecha --}}
                    <aside id="derecha" class="caja">

                        <div id="derecha1" class="derechaClass">
                            <h2 class="font-weight-bold" >{{$evento['titulo']}}</h2>
                            <h5>Categoria: <strong>{{$evento['categoria']}}</strong></h5>
                            <h5>Descripcion:  <strong>{{$evento['descripcion']}}</strong></h5>

                        </div>
                        {{-- <div class="clearfix"></div> --}}

                        <div id="derecha2" class="derechaClass">
                            <form method="POST" action="{{ route('tickets.addEvento') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="row row justify-content-center"> --}}
                                {{-- SELECT UBICACION --}}
                                <div class="derechaCompra">
                                    <select name="ubicacion_id" id="select-ubicaciones" class="form-control select-control" autofocus
                                        required>
                                        <option value="">Seleccionar Ubicacion</option>
                                        @foreach ($ubicaciones as $ubicacion)
                                            <option value="{{ $ubicacion['id'] }}">{{ $ubicacion['nombre'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- SELECT FECHA --}}
                                <div class="derechaCompra">
                                    <select name="fecha_id" id="select-fechas" class="form-control select-control" required>
                                        <option value="">Seleccionar Fecha</option>
                                    </select>
                                </div>

                                {{-- SELECT Sector --}}
                                <div id="id-sectores" class="derechaCompra" hidden>
                                    <select name="sector_id" id="select-sectores" class="form-control select-control" >
                                        <option value="">Seleccionar Sector</option>
                                    </select>
                                </div>

                                {{-- SELECT Espacio --}}
                                <div id="id-espacios" class="derechaCompra" hidden>
                                    <h6>Seleccionar Espacio:</h6>
                                    <select name="espacio_id[]" id="select-espacios" class="form-control select-control" multiple>
                                        {{-- <option value="">Seleccionar Espacio</option> --}}
                                    </select>
                                </div>
                                {{-- INPUT CANTIDAD --}}
                                {{-- @if (isset($ubicaciones) && $ubicaciones[0]['precio'] > 0) --}}
                                <div id="id-cantidad" class="derechaCompra" hidden>
                                    <div class="form-group input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-arrow-up"> cantidad</i>
                                        </span>
                                        <input id="select-cantidad" type="number" value="1" name="cantidad"
                                            {{-- class="  form-control" min="1" max="50"> --}} class="  form-control select-control" min="1">
                                    </div>
                                </div>
                                {{-- @error('cantidad')<p>DEBE INGRESAR LA CANTIDAD</p>@enderror --}}
                                {{-- BUTTON AÑADIR --}}
                                <div class="derechaCompra">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"
                                            aria-hidden="true"></i>Añadir</button>
                                </div>
                                {{-- @else
                                    <div class="derechaCompra">
                                        <a href="#" class="btn btn-dark" type="submit">
                                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>Comprar Ticket</a>
                                    </div>
                                @endif --}}
                                {{-- oculto --}}
                                <input type="hidden" name="tickets" value="{{ json_encode($tickets) }}">
                                <input id="evento" type="hidden" name="evento_id"
                                    value="{{ isset($ubicaciones) ? $ubicaciones[0]->evento_id : '' }}">
                            </form>
                        </div>
                    </aside>
                    <div class="clearfix"></div>
                </div>






                <br>
                <br>

                @if (isset($tickets) && count($tickets) > 0)
                    
                <div class="row">
                    <div class="col-9">
                        <h2 class="font-weight-bold" style="margin-left: 45%">Detalles de la compra</h2>
                    </div>
                    {{-- Button Pagar ahora --}}
                    <div class="col-3">
                        <form action="{{ route('tipoPagos.indexTipoPago') }}" role="form" enctype="multipart/form-data"
                            style="">
                            @csrf
                            <div style="margin-block: 10px">
                                <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#modalTigoMoney">
                                    <img src="{{ asset('img/tigo-money.png') }}" height="30" width="75" />
                                </button>
                                <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#modalTarjeta">
                                    <img src="{{ asset('img/tarjeta.png') }}" height="30" width="75" />
                                </button>
                            </div>
                            {{-- oculto --}}
                            <input type="hidden" name="tickets" value="{{ json_encode($tickets) }}">
                            <input id="evento" type="hidden" name="evento_id"
                                value="{{ isset($ubicaciones) ? $ubicaciones[0]->evento_id : '' }}">
                        </form>
                    </div>
                </div>



                {{-- tabla --}}
                <div style="margin-top: 2%">
                    <table class="table table-striped" style="margin: 10px auto; width: 80%; border: 1px solid black;">
                        <thead>
                            <tr>
                                {{-- <th scope="col">Codigo</th> --}}
                                <th scope="col">Ubicacion</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Sector</th>
                                <th scope="col">Espacio</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">precio</th>
                                <th scope="col">importe</th>
                                <th scope="col" width='3%'></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    {{-- <td>{{ $ticket['id'] }}</td> --}}
                                    <td>{{ $ticket['ubicacion'] }}</td>
                                    <td>{{ $ticket['fecha'] }}</td>
                                    <td>{{ $ticket['sector'] }}</td>
                                    <td>{{ $ticket['espacio'] }}</td>
                                    <td>{{ $ticket['cantidad'] }}</td>
                                    <td>{{ $ticket['precio'] }}</td>
                                    <td>{{ $ticket['precio'] * $ticket['cantidad'] }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('tickets.destroyEvento', $ticket['id']) }}"
                                            role="form" enctype="multipart/form-data">
                                            @csrf
                                            {{-- oculto --}}
                                            <input type="hidden" name="tickets" value="{{ json_encode($tickets) }}">
                                            <input id="evento" type="hidden" name="evento_id"
                                                value="{{ isset($ubicaciones) ? $ubicaciones[0]->evento_id : '' }}">
                                            {{-- button --}}
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"
                                                title="Borrar">
                                                {{-- <i class="fas fa-times"></i> --}}
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @endif
    
    <div class="modal fade" id="modalTigoMoney" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><img src="{{ asset('img/tigo-money.png') }}" height="35" width="95"/></h5>
                </div>
                <div class="modal-body">

                    <form action="{{ route('datosPagos.storeDatoPago') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-address-card"> CI/NIT</i>
                                        </span>
                                        <input type="number" id="ci" name="ci" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-user-circle"> Nombre</i>
                                        </span>
                                        <input type="text" id="nombre" name="nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-mobile"> Celular</i>
                                        </span>
                                        <input type="text" id="nro" name="nro" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                    <button class="btn btn-info" type="submit"><i class="fa fa-credit-card"
                                            aria-hidden="true"></i> Pagar ahora</button>
                                </div>

                                {{-- oculto --}}
                                <input type="hidden" name="tickets" value="{{ json_encode($tickets) }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalTarjeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <img src="{{ asset('img/tarjeta.png') }}" height="35" width="95" /></h5>
                </div>
                <div class="modal-body">

                    <form action="{{ route('datosPagos.storeDatoPago2') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-address-card"> CI/NIT</i>
                                        </span>
                                        <input type="number" id="ci" name="ci" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-user-circle"> Nombre</i>
                                        </span>
                                        <input type="text" id="nombre" name="nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-credit-card"> Nro Tarjeta</i>
                                        </span>
                                        <input type="text" id="nro" name="nro" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"> Fecha de Expiracion</i>
                                        </span>
                                        <input type="datetime-local" id="expiracion" name="expiracion"
                                            class="form-control" value="{{ Date('Y-m-d\TH:i', time()) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-credit-card"> CVC</i>
                                        </span>
                                        <input type="number" id="cvc" name="cvc" class="form-control" max="999" min="100">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button class="btn btn-info" type="submit"><i class="fa fa-credit-card"
                                            aria-hidden="true"></i> Pagar ahora</button>
                                </div>
                                {{-- oculto --}}
                                <input type="hidden" name="tickets" value="{{ json_encode($tickets) }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ticket/ubicacion/createLista.css') }}">

@stop

@section('scripts')

    <script type="text/javascript" src="{{ asset('js/map/mapa2.js') }}"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=setMap"></script>
    <script type="text/javascript" src="{{ asset('js/path.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ticket/combo1.js') }}"></script>


@endsection
