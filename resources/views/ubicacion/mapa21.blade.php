@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ubicacion</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="latitud">Latitud</label>
                            <input type="text" id="latitud" class="form-control">
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="longitud">longitud</label>
                            <input type="text" id="longitud" class="form-control">
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-12">
                        <div id="map" style="width: 100%; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('js/map/mapa2.js') }}"></script>
    {{-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUexPfr0cJLlaF08zCb1X3aggukbaIAI&callback=initMap"></script> --}}
    <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
@endsection
