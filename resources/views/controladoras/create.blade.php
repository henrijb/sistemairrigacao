@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cadastrar Nova Controladora</h2>
        <form action="{{ route('ct_create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="A">Ativo</option>
                    <option value="D">Desativado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numero_portas_analogicas">Portas Analógicas:</label>
                <input type="text" class="form-control" id="numero_portas_analogicas" name="numero_portas_analogicas" required>
            </div>
            <div class="form-group">
                <label for="numero_portas">Portas Digitais:</label>
                <input type="text" class="form-control" id="numero_portas_digitais" name="numero_portas_digitais" required>
            </div>
            <div class="form-group">
                <label for="ip">IP:</label>
                <input type="text" class="form-control" id="ip" name="ip" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('ct_index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
