@extends('layouts.app')

@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-warning" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
    <div class="container">
        <h2>Criar Nova Planta</h2>
        <form action="{{ route('pl_create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>
            <div class="form-group">
                <label for="data_plantacao">Data da Plantação:</label>
                <input type="date" class="form-control" id="data_plantacao" name="data_plantacao" value="{{ old('data_plantacao') }}" required>
            </div>
            <div class="form-group">
                <label for="hora_rega">Percentual mínimo de umidade do solo:</label>
                <input type="number" class="form-control" id="percentual_umidade" name="percentual_umidade" value="{{ old('percentual_umidade') }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="A">Ativo</option>
                    <option value="D">Desativado</option>
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
                <label for="porta_arduino_analogica">Arduino Porta Analogica:</label>
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

        </form>
    </div>
@endsection

