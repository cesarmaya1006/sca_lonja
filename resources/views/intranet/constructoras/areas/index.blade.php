@extends('intranet.layout.app')

@section('css_pagina')
@endsection

@section('tituloPagina')
    <i class="fas fa-check-square mr-3" aria-hidden="true"></i> Parametros - Áreas por empresas
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Empresas->Áreas</li>
@endsection

@section('titulo_card')
    Listado de Áreas por Empresas
@endsection

@section('botones_card')
    <a href="{{ route('empresas_areas.create') }}"
        class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
        <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
        Nuevo Registro
    </a>
@endsection

@section('cuerpoPagina')
    @can('empresas_areas.index')
        <div class="row">
            <div class="col-12 col-md-3 form-group" id="caja_regional">
                <label for="regional_id">Regional</label>
                <select id="regional_id" class="form-control form-control-sm" data_url="{{ route('compania.getCompaniasRegional') }}">
                    <option value="">Elija Regional</option>
                    @foreach ($regionales as $regional)
                        <option value="{{ $regional->id }}">{{ $regional->regional }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-3 form-group" id="caja_constructora">
                <label for="constructora_id">Regional</label>
                <select id="constructora_id" class="form-control form-control-sm" data_url="{{ route('empresas_areas.getAreas') }}">
                    <option value="">Elija primero Regional</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-md-center">
            <div class="col-12 col-md-10 table-responsive">
                <table class="table table-striped table-hover table-sm tabla_data_table" id="tabla_empleados">
                    <thead id="thead_empresas_areas">
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Area</th>
                            <th class="text-center">Area Superior</th>
                            <th class="text-center">Dependencias</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="tbody_empresas_areas">

                    </tbody>
                </table>
            </div>
        </div>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        @can('empresas_areas.edit')
            <input type="hidden" id="permiso_empresas_areas_edit" value="1" data_url="{{ route('empresas_areas.edit', ['id' => 1]) }}">
        @else
            <input type="hidden" id="permiso_empresas_areas_edit" value="0" data_url="{{ route('empresas_areas.edit', ['id' => 1]) }}">
        @endcan

        @can('empresas_areas.destroy')
            <input type="hidden" id="permiso_empresas_areas_destroy" value="1" data_url="{{ route('empresas_areas.destroy', ['id' => 1]) }}">
        @else
            <input type="hidden" id="permiso_empresas_areas_destroy" value="0" data_url="{{ route('empresas_areas.destroy', ['id' => 1]) }}">
        @endcan
    @else
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6">
                <div class="alert alert-warning alert-dismissible mini_sombra">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Sin Acceso!</h5>
                    <p style="text-align: justify">Su usuario no tiene permisos de acceso para esta vista, Comuniquese con el administrador del sistema.</p>
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
    <script src="{{ asset('js/intranet/general/datatablesini.js') }}"></script>
    <script src="{{ asset('js/intranet/constructoras/areas/index.js') }}"></script>
@endsection
