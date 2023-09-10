@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Usuários</h2>
        <a href="{{ url('/users/create') }}" class="btn btn-primary">Novo Usuário</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('/users/' . $user->id . '/show/') }}" class="btn btn-info">Ver</a>
                        <a href="{{ url('/users/' . $user->id . '/edit/') }}" class="btn btn-warning">Editar</a>
                        <form action="{{ url('/users/' . $user->id . '/delete/'  ) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
