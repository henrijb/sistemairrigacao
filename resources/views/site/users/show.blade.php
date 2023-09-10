@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalhes do Usuário</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Nome:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ url('/users') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection
