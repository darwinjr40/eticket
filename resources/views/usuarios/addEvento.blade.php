@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Adicionar a un Evento</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('usuarios.UserEventoStore', $user_id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <h5><i class="fa fa-lock"> Seleccionar Eventos:</i></h5>
                                    <select class="js-multiple js-states form-control" id="id_label_multiple"
                                        name="eventos[]" multiple="multiple">
                                        @foreach ($eventos as $evento)
                                            <option value="{{ $evento->id }}"
                                                {{ in_array($evento['id'], $eventos_id) ? 'selected' : '' }}
                                                > {{ $evento->titulo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- <select class="js-example-basic-multiple js-states form-control"  name="permisos[]" multiple>
                                        @foreach ($permission as $value)
                                            <option value="{{$value->id}}" {{(in_array($value->id, $rolePermissions)) ? 'selected':''}}>{{$value->name}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-multiple').select2();
        });
    </script>
@endsection
