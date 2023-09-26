@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Controladora</h2>
        <form action="{{ url('/controladoras/' . $controladora->id . '/update') }}" method="POST">
            @csrf
            @method('PUT')
             <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $controladora->nome }}"  required>
            </div>
            <div class="form-group">
                <label for="numero_portas_analogicas">Portas Analógicas:</label>
                <input type="text" class="form-control" id="numero_portas_analogicas" name="numero_portas_analogicas" value="{{ $controladora->numero_portas_analogicas }}"  required>
            </div>
            <div class="form-group">
                <label for="numero_portas_digitais">Portas Digitais:</label>
                <input type="text" class="form-control" id="numero_portas_digitais" name="numero_portas_digitais" value="{{ $controladora->numero_portas_digitais }}"  required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" value="{{ $controladora->status }}"  required>
                    <option value="A">Ativo</option>
                    <option value="D">Desativado</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('ct_index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
