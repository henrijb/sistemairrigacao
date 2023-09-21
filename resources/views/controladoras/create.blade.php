@extends('layouts.app')

<!--
@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-warning" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
-->
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
                <label for="numero_portas">Quantidade de Portas:</label>
                <input type="text" class="form-control" id="numero_portas" name="numero_portas" required>
            </div>
            <div class="form-group">
                <label for="ip">IP:</label>
                <input type="text" class="form-control" id="ip" name="ip" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('pl_index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
