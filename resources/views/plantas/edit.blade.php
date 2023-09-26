@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Usuário</h2>
        <form action="{{ url('/plantas/' . $planta->id . '/update') }}" method="POST">
            @csrf
            @method('PUT')
            @include('plantas.partials.form')
        </form>
    </div>
@endsection
