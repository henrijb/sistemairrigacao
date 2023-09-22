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
                    <td>{{ $planta->nome }}</td>
                    <td>{{ $planta->data_plantacao->format('d/m/Y') }}</td>
                    <td>{{ isset($planta->ultima_rega) ? $planta->ultima_rega->format('d/m/Y H:i') : '' }}</td>

                    @if($planta->status == 'A')
                        <td>Ativo</td>
                    @else
                        <td>Desativado</td>
                    @endif

                    <td>
                        <div class="toolbar">
                            <a href="{{ url('/plantas/' . $planta->id . '/show/') }}" class="btn btn-info">Ver</a>
                            <a href="{{ url('/plantas/' . $planta->id . '/edit/') }}" class="btn btn-warning">Editar</a>
                            <form action="{{ url('/plantas/' . $planta->id . '/delete/'  ) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
