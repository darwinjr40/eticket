@extends('layouts.app')

@section('template_title')
    Update Ubicacion
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Actualizar Ubicacion</h3>
        </div>
        <div class="">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('ubicacions.update', $ubicacion->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('ubicacion.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        const coordenada = { lat: {{ $ubicacion->latitud }}, lng: {{ $ubicacion->longitud }} }; 
    </script>
    <script type="text/javascript" src="{{ asset('js/map/mapa2.js') }}">
    </script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
    {{-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUexPfr0cJLlaF08zCb1X3aggukbaIAI&callback=initMap"></script> --}}
@endsection
