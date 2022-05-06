@extends('layouts.app')

@section('template_title')
    Create Ubicacion
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Ubicacion</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card card-default">
                            {{-- <div class="card-header">
                                <span class="card-title">Create Ubicacion</span>
                            </div> --}}
                            <div class="card-body">
                                <form method="POST" action="{{ route('ubicacions.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf

                                    @include('ubicacion.form')

                                    <div id="map" style="width: 100%; height: 500px;"></div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                @includeif('partials.errors')

            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('js/map/mapa2.js') }}"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
    {{-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUexPfr0cJLlaF08zCb1X3aggukbaIAI&callback=initMap"></script> --}}
    
@endsection
