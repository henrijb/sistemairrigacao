<div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $planta->nome) }}" required>
</div>
<div class="form-group">
    <label for="data_plantacao">Data da Plantação:</label>
    {{  $planta->data_plantacao->format('d/m/Y') }}
    <input type="date" class="form-control" id="data_plantacao" name="data_plantacao" value="{{ old('data_plantacao', $planta->data_plantacao->format('Y-m-d')) }}" required>
</div>
<div class="form-group">
    <label for="hora_rega">Hora das Regas:</label>
    <span>{{ isset($planta->ultima_rega) ? $planta->ultima_rega->format('d/m/Y H:i') : '' }}</span>
</div>
<div class="form-group">
    <label for="hora_rega">Percentual mínimo de umidade do solo:</label>
    <input type="number" class="form-control" id="percentual_umidade" name="percentual_umidade" value="{{ old('percentual_umidade', $planta->percentual_umidade) }}" required>
</div>
<div class="form-group">
    <label for="ultima_rega">Hora da última rega:</label>
    <input type="text" class="form-control" id="ultima_rega" name="ultima_rega" value="{{ old('ultima_rega', $planta->ultima_rega) }}">
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" id="status" name="status" required>
        <option value="A" {{ $planta->status == 'A' ? 'selected' : '' }}>Ativo</option>
        <option value="D" {{ $planta->status == 'D' ? 'selected' : '' }}>Desativado</option>
    </select>
</div>
<div><hr></div>
<div class="form-group">
    <label for="id_arduino">Arduino ID :</label>
    <select class="form-control" name="id_arduino" id="id_arduino" required>
        <option>Selecione</option>
        @foreach ($controladoras as $controladora)
            <option value="{{ $controladora->id }}">{{ $controladora->nome }}</option>
        @endforeach
    </select>
    <div class="text-danger">{{ $errors->first('id_arduino') }}</div>
</div>
<div class="form-group">
    <label for="porta_arduino_analogica">Arduino Porta Analógica:</label>
    <select class="form-control" name="porta_arduino_analogica" id="porta_arduino_analogica" required>
        <option>Selecione</option>
    </select>
    <div class="text-danger">{{ $errors->first('porta_arduino_analogica') }}</div>
</div>
<div class="form-group">
    <label for="porta_arduino_digital">Arduino Porta Digital:</label>
    <select class="form-control" name="porta_arduino_digital" id="porta_arduino_digital" required>
        <option>Selecione</option>
    </select>
    <div class="text-danger">{{ $errors->first('porta_arduino_digital') }}</div>
</div>
<div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('pl_index') }}" class="btn btn-primary">Voltar</a>
</div>
