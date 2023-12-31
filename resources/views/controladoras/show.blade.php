@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalhes da Controladora</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td>{{ $controladora->id }}</td>
                </tr>
                <tr>
                    <th>Nome:</th>
                    <td>{{ $controladora->nome }}</td>
                </tr>
                <tr>
                    <th>Status:</th>

                     @if($controladora->status == 'A')
                        <td>Ativo</td>
                     @else
                        <td>Desativado</td>
                     @endif
                </tr>
                <tr>
                    <th>Portas Analógicas:</th>
                    <td>{{ $controladora->numero_portas_analogicas }}</td>
                </tr>
                <tr>
                    <th>Portas Digitais:</th>
                    <td>{{ $controladora->numero_portas_digitais }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('ct_index') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection
