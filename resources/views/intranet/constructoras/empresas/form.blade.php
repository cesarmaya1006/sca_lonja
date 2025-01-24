@if (isset($empresa_edit))
    <div class="row">
        <div class="col-12">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="estado" id="estado" value="{{$empresa_edit->estado?'1':'0'}}" {{$empresa_edit->estado?'checked':''}}>
                <label class="form-check-label" id="labelCheck" for="estado">{{$empresa_edit->estado?'Empresa Activa':'Empresa Inactiva'}}</label>
            </div>
        </div>
    </div>
    <br>
@endif
<div class="row">
    <input type="hidden" name="rol_id" value="3">
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="regional_id">Regional</label>
        <select id="regional_id" name="regional_id" class="form-control form-control-sm" data_url="{{route('areas.getAreas')}}" required>
            <option value="">Elija Regional</option>
            @foreach ($regionales as $regional)
                <option value="{{ $regional->id }}" {{isset($empresa_edit)? ($empresa_edit->regional_id==$regional->id? 'selected':''):''}}>
                    {{ $regional->regional }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="tipo_documento_id">Tipo de identificación</label>
        <select id="tipo_documento_id" class="form-control form-control-sm" name="tipo_documento_id" required>
            <option value="">Elija tipo</option>
            @foreach ($tiposdocu as $tipoDocu)
                <option value="{{ $tipoDocu->id }}" {{isset($empresa_edit)?$empresa_edit->tipo_documento_id == $tipoDocu->id?'selected':'':''}}>
                    {{ $tipoDocu->abreb_id .' - ' . $tipoDocu->tipo_id}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="identificacion">Identificación</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('identificacion', $empresa_edit->identificacion ?? '') }}" name="identificacion" id="identificacion" required>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="constructora">Nombres Empresa</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('constructora', $empresa_edit->constructora ?? '') }}" name="constructora" id="constructora" required>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="contacto">Contacto</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('contacto', $empresa_edit->contacto ?? '') }}" name="contacto" id="contacto" required>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="email">Correo Electrónico</label>
        <input type="email" class="form-control form-control-sm" value="{{ old('email', $empresa_edit->email ?? '') }}" name="email" id="email" required>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="telefono">Teléfono</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('telefono', $empresa_edit->telefono ?? '') }}" name="telefono" id="telefono" required>
    </div>
</div>

