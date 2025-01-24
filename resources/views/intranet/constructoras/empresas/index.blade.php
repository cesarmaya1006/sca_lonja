@extends('intranet.layout.app')

@section('css_pagina')

@endsection

@section('tituloPagina')
    <i class="fas fa-check-square mr-3" aria-hidden="true"></i> Parametros - Empresas
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Empresas</li>
@endsection

@section('titulo_card')
    Listado de Empresas

@endsection

@section('botones_card')
    <a href="{{ route('compania.create') }}" class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
        <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
        Nuevo Registro
    </a>
@endsection

@section('cuerpoPagina')
    @can('compania.index')
        <div class="row d-flex justify-content-md-center">
            <div class="col-12 table-responsive">
                <table class="table table-striped table-hover table-sm tabla_data_table_xs tabla-borrando display" id="tabla-data">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th>Regional</th>
                            <th>Identificacion</th>
                            <th>Empresa</th>
                            <th>Contacto</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regionales as $regional)
                            @foreach ($regional->empresas as $empresa)
                                <tr>
                                    <td>{{ $empresa->id }}</td>
                                    <td class="text-nowrap">{{ $empresa->regional->regional }}</td>
                                    <td class="text-nowrap">{{ $empresa->tipo_docu->abreb_id . ' - ' . $empresa->identificacion }}</td>
                                    <td class="text-nowrap">{{ $empresa->constructora }}</td>
                                    <td class="text-nowrap">{{ $empresa->contacto }}</td>
                                    <td class="text-nowrap">{{ $empresa->email }}</td>
                                    <td class="text-nowrap">{{ $empresa->telefono }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-{{ $empresa->estado == 1 ? 'success' : 'danger' }}">{{ $empresa->estado == 1 ? 'Activa' : 'Inactiva' }}</span>
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('compania.edit', ['id' => $empresa->id]) }}"
                                            class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                        <form action="{{ route('compania.destroy', ['id' => $empresa->id]) }}"
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6">
                <div class="alert alert-warning alert-dismissible mini_sombra">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Sin Acceso!</h5>
                    <p style="text-align: justify">Su usuario no tiene permisos de acceso para esta vista, Comuniquese con el
                        administrador del sistema.</p>
                </div>
            </div>
        </div>
    @endcan
@endsection

@section('footer_card')
@endsection

@section('modales')
@endsection

@section('script_pagina')
    @include('intranet.layout.dataTableNew')
    <script src="{{asset('js/intranet/general/datatablesini.js')}}"></script>
    <script src="{{ asset('js/intranet/regionales/usuario/index.js') }}"></script>
@endsection
