@extends('layouts.app')

@section('template_title')
    {{ $ubicacion->name ?? 'Show Ubicacion' }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Datos de Ubicacion</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <div class="float-left">
                            <span class="card-title">Datos de Ubicacion</span>
                        </div> --}}
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ubicacions.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $ubicacion->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $ubicacion->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $ubicacion->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad:</strong>
                            {{ $ubicacion->capacidad }}
                        </div>
                        <div class="form-group">
                            <strong>Latitud:</strong>
                            {{ $ubicacion->latitud }}
                        </div>
                        <div class="form-group">
                            <strong>Longitud:</strong>
                            {{ $ubicacion->longitud }}
                        </div>

                        <div id="map" style="width: 100%; height: 500px;"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        const coordenada = { lat: {{ $ubicacion->latitud }}, lng: {{ $ubicacion->longitud }} }; 
    </script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=setMap"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD61XJZbxHDlLWATXSGIAX3c7OTgh5dgH4&callback=initMap&libraries=drawing&v=weekly"></script> --}}
    <script type="text/javascript" src="{{ asset('js/map/mapa2.js') }}"></script>
    {{-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUexPfr0cJLlaF08zCb1X3aggukbaIAI&callback=setMap"></script> --}}
@endsection
