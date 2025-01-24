<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label class="requerido" for="departamento_id">Departamento</label>
            <select id="departamento_id" name="departamento_id" class="form-control form-control-sm" required>
                <option value="">Elija Departamento</option>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" {{isset($municipio_edit)?($municipio_edit->departamento_id==$departamento->id? 'selected':''):''}}>{{ $departamento->departamento }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label class="requerido" for="cod_municipio">Código del Municipio</label>
            <input type="text" class="form-control form-control-sm" name="cod_municipio" id="cod_municipio" aria-describedby="helpId"
                value="{{ old('cod_municipio', $municipio_edit->cod_municipio ?? '') }}" placeholder="Código de municipio" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label class="requerido" for="municipio">Nombre del Municipio</label>
            <input type="text" class="form-control form-control-sm" name="municipio" id="municipio" aria-describedby="helpId"
                value="{{ old('municipio', $municipio_edit->municipio ?? '') }}" placeholder="Nombre de municipio" required>
        </div>
    </div>
</div>
