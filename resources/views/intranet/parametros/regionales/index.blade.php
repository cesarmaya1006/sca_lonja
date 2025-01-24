@extends('intranet.layout.app')

@section('css_pagina')

@endsection

@section('tituloPagina')
    <i class="fas fa-check-square mr-3" aria-hidden="true"></i> Parametros - Regionales
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Regionales</li>
@endsection

@section('titulo_card')
    Listado de Regionales
@endsection

@section('botones_card')
    <a href="{{ route('regional.create') }}" class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
        <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
        Nuevo Registro
    </a>
@endsection

@section('cuerpoPagina')
    <div class="row d-flex justify-content-md-center">
        <div class="col-12 table-responsive">
            <table class="table table-striped table-hover table-sm tabla_data_table_xs tabla-borrando display" id="tabla-data">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th>Departamento</th>
                        <th>Regional</th>
                        <th>Estado</th>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($regionales as $regional)
                        <tr>
                            <td>{{ $regional->id }}</td>
                            <td>{{ $regional->nacional ? '---' : $regional->departamento->departamento }}</td>
                            <td>{{ $regional->regional }}</td>
                            <td><span
                                    class="badge bg-{{ $regional->estado == 1 ? 'success' : 'danger' }}">{{ $regional->estado == 1 ? 'Activa' : 'Inactiva' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('regional.edit', ['id' => $regional->id]) }}"
                                    class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fas fa-pen-square"></i>
                                </a>
                                <form action="{{ route('regional.destroy', ['id' => $regional->id]) }}"
                                    class="d-inline form-eliminar" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                        title="Eliminar este registro">
                                        <i class="fa fa-fw fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer_card')
@endsection

@section('modales')
@endsection

@section('script_pagina')
    @include('intranet.layout.dataTableNew')
    <script src="{{asset('js/intranet/general/datatablesini.js')}}"></script>
@endsection
