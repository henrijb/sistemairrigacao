@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead"></p>
        @endauth

        @guest
        <h1>Bem vindo ao sistema de irrigação.</h1>
        <p class="lead"></p>
        @endguest
    </div>
@endsection
