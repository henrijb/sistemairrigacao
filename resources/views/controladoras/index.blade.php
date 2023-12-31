@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Controladoras</h2>
        <a href="{{ route('ct_create') }}" class="btn btn-primary">Nova Controladora</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Portas Analógicas</th>
                    <th>Portas Digitais</th>
                    <th>Status</th>
                    <th>IP<th>
                </tr>
            </thead>
            <tbody>
                @foreach ($controladoras as $controladora)
                <tr>
                    <td>{{ $controladora->id }}</td>
                    <td>{{ $controladora->nome }}</td>
                    <td>{{ $controladora->numero_portas_analogicas }}</td>
                    <td>{{ $controladora->numero_portas_digitais }}</td>
                    @if($controladora->status == 'A')
                        <td>Ativo</td>
                    @else
                        <td>Desativado</td>
                    @endif
                    <td>{{ $controladora->ip }}</td>
                    <td>
                        <a href="{{ url('/controladoras/' . $controladora->id . '/show/') }}" class="btn btn-info">Ver</a>
                        <a href="{{ url('/controladoras/' . $controladora->id . '/edit/') }}" class="btn btn-warning">Editar</a>
                        <form action="{{ url('/controladoras/' . $controladora->id . '/delete/'  ) }}" method="POST" style="display: inline;">
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
