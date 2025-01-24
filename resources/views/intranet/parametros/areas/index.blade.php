@extends('intranet.layout.app')

@section('css_pagina')

@endsection

@section('tituloPagina')
    <i class="fas fa-check-square mr-3" aria-hidden="true"></i> Parametros - Áreas
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Áreas</li>
@endsection

@section('titulo_card')
    Listado de Áreas por regionales
@endsection

@section('botones_card')
    <a href="{{ route('area.create') }}" class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
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
                        <th class="text-center">Regional</th>
                        <th class="text-center">Id</th>
                        <th class="text-center">Area</th>
                        <th class="text-center">Area Superior</th>
                        <th class="text-center">Dependencias</th>
                        <td></td>
                    </tr>
                </thead>
                <tbody id="tbody_areas">
                    @foreach ($regionales as $regional)
                        @foreach ($regional->areas as $area)
                            <tr>
                                <td style="white-space:nowrap;">{{ $regional->regional }}</td>
                                <td class="text-center">{{ $area->id }}</td>
                                <td style="white-space:nowrap;">{{ $area->area }}</td>
                                <td class="text-center">{{ $area->area_id ? $area->area_sup->area : '---' }}</td>
                                <td class="text-center">
                                    @if ($area->areas->count() > 0)
                                        <button type="submit"
                                            class="btn-accion-tabla tooltipsC mostrar_dependencias text-info"
                                            onClick="mostrarModal('{{ route('areas.getDependencias', ['id' => $area->id]) }}')"
                                            title="Mostrar Dependencias" data_id ="{{ $area->id }}"
                                            data_url = "{{ route('areas.getDependencias', ['id' => $area->id]) }}">
                                            {{ $area->areas->count() }}
                                        </button>
                                    @else
                                        <h6 class="text-danger">---</h6>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-evenly align-items-center">
                                    @can('area.edit')
                                        <a href="{{ route('area.edit', ['id' => $area->id]) }}"
                                            class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                    @endcan
                                    @can('area.destroy')
                                        <form action="{{ route('area.destroy', ['id' => $area->id]) }}"
                                            class="d-inline form-eliminar" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                title="Eliminar este registro">
                                                <i class="fa fa-fw fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
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
