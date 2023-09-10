@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Criar Nova Planta</h2>
        <form action="{{ route('pl_create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="data_plantacao">Data da Plantação:</label>
                <input type="text" class="form-control" id="data_plantacao" name="data_plantacao" required>
            </div>
            <div class="form-group">
                <label for="hora_rega">Hora das Regas:</label>
                <input type="text" class="form-control" id="hora_rega" name="hora_rega" required>
            </div>
            <div class="form-group">
                <label for="ultima_rega">Hora da última rega:</label>
                <input type="text" class="form-control" id="ultima_rega" name="ultima_rega" required>
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
                <input type="text" class="form-control" id="id_arduino" name="id_arduino" required>
            </div>
            <div class="form-group">
                <label for="porta_arduino">Arduino Porta:</label>
                <input type="text" class="form-control" id="porta_arduino" name="porta_arduino" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('pl_index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
