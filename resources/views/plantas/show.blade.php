@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalhes da Planta</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td>{{ $planta->id }}</td>
                </tr>
                <tr>
                    <th>Nome:</th>
                    <td>{{ $planta->nome }}</td>
                </tr>
                <tr>
                    <th>Data da Plantação:</th>
                    <td>{{ $planta->data_plantacao->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Hora das Regas:</th>
                    <td>{{ $planta->hora_rega }}</td>
                </tr>
                <tr>
                    <th>Hora da última rega:</th>
                    <td>{{ isset($planta->ultima_rega) ? $planta->ultima_rega->format('d/m/Y H:i') : '' }}</td>
                </tr>
                <tr>
                    <th>Status:</th>

                     @if($planta->status == 'A')
                        <td>Ativo</td>
                     @else
                        <td>Desativado</td>
                     @endif
                </tr>
                <tr>
                    <th>Arduino ID:</th>
                    <td>{{ $planta->id_arduino }}</td>
                </tr>
                <tr>
                    <th>Arduino Porta:</th>
                    <td>{{ $planta->porta_arduino }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('pl_index') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection
