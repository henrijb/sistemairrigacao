@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Somente pessoas autorizadas podem visualizar.</p>
        @endauth

        @guest
        <h1>Página inicial</h1>
        <p class="lead">É necessário se logar para visualizar</p>
        @endguest
    </div>
@endsection