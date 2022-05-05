@extends('layouts.app')

@section('template_title')
    {{ $ubicacion->name ?? 'Show Ubicacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ubicacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ubicacions.index') }}"> Back</a>
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

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
