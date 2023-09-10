@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Plantas</h2>
        <a href="{{ route('pl_create') }}" class="btn btn-primary">Nova Planta</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data Platação</th>
                    <th>Última Rega</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plantas as $planta)
                <tr>
                    <td>{{ $planta->id }}</td>
                    <td>{{ $planta->name }}</td>
                    <td>{{ $planta->email }}</td>
                    <td>
                        <a href="{{ url('/plantas/' . $planta->id . '/show/') }}" class="btn btn-info">Ver</a>
                        <a href="{{ url('/plantas/' . $planta->id . '/edit/') }}" class="btn btn-warning">Editar</a>
                        <form action="{{ url('/plantas/' . $planta->id . '/delete/'  ) }}" method="POST" style="display: inline;">
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
