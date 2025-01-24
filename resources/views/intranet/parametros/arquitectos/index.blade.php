@extends('intranet.layout.app')

@section('css_pagina')

@endsection

@section('tituloPagina')
    <i class="fas fa-check-square mr-3" aria-hidden="true"></i> Parametros - Arquitectos
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Arquitectos</li>
@endsection

@section('titulo_card')
    Listado de Arquitectos por regionales

@endsection

@section('botones_card')
    <a href="{{ route('arquitecto.create') }}" class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
        <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
        Nuevo Registro
    </a>
@endsection

@section('cuerpoPagina')
    @can('arquitecto.index')
    <div class="row">
        <div class="col-12 col-md-3 form-group" id="caja_empresas">
            <label class="requerido" for="region_id">Regional</label>
            <select class="form-control form-control-sm" data_url="{{ route('arquitecto.getArquitectosRegional') }}"
                id="region_id">
                <option value="">Elija regional</option>
                @foreach ($regionales as $regional)
                    <option value="{{ $regional->id }}">{{ $regional->regional }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-md-center">
        <input type="hidden" name="titulo_tabla" id="titulo_tabla" value="Listado de Cargos">
        <input type="hidden" id="control_dataTable" value="1">
        <input type="hidden" id="cargos_edit" data_url="{{ route('arquitecto.edit', ['id' => 1]) }}">
        <input type="hidden" id="cargos_destroy" data_url="{{ route('arquitecto.destroy', ['id' => 1]) }}">
        @csrf @method('delete')
        <div class="col-12 col-md-8 table-responsive">
            <table class="table table-striped table-hover table-sm tabla_data_table" id="tabla_arquitectos">
                <thead id="thead_arquitectos">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Identificación</th>
                        <th class="text-center">Nombres y Apellidos</th>
                        <th class="text-center">Correo Electrónico</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center"></td>
                    </tr>
                </thead>
                <tbody id="tbody_arquitectos">


                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    @can('arquitecto.edit')
            <input type="hidden" id="permiso_arquitectos_edit" value="1" data_url="{{route('arquitecto.edit',['id'=>1])}}">
        @else
            <input type="hidden" id="permiso_arquitectos_edit" value="0" data_url="{{route('arquitecto.edit',['id'=>1])}}">
        @endcan

        @can('arquitecto.activar')
            <input type="hidden" id="permiso_arquitectos_activar" value="1" data_url="{{route('arquitecto.activar',['id'=>1])}}">
        @else
            <input type="hidden" id="permiso_arquitectos_activar" value="0" data_url="{{route('arquitecto.activar',['id'=>1])}}">
        @endcan
    @else
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-6">
            <div class="alert alert-warning alert-dismissible mini_sombra">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Sin Acceso!</h5>
                <p style="text-align: justify">Su arquitecto no tiene permisos de acceso para esta vista, Comuniquese con el
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
    <script src="{{ asset('js/intranet/regionales/arquitecto/index.js') }}"></script>
@endsection
