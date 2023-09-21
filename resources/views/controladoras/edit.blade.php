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
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" value="{{ $controladora->status }}"  required>
                    <option value="A">Ativo</option>
                    <option value="D">Desativado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numero_portas">Quantidade de Portas:</label>
                <input type="text" class="form-control" id="numero_portas" name="numero_portas" value="{{ $controladora->numero_portas }}"  required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('ct_index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
