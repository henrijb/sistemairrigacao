@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Usuário</h2>
        <form action="{{ url('/users/' . $user->id . '/update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Nova Senha:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div>
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('us_index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
