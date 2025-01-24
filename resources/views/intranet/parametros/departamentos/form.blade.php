<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label class="requerido" for="departamento">Nombre del Departamento</label>
            <input type="text" class="form-control form-control-sm" name="departamento" id="departamento" aria-describedby="helpId"
                value="{{ old('departamento', $departamento_edit->departamento ?? '') }}" placeholder="Nombre de departamento" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label class="requerido" for="codigo">Código del Departamento</label>
            <input type="text" class="form-control form-control-sm" name="codigo" id="codigo" aria-describedby="helpId"
                value="{{ old('codigo', $departamento_edit->codigo ?? '') }}" placeholder="Código de departamento" required>
        </div>
    </div>
</div>
