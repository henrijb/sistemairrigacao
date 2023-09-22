@extends('layouts.app')

@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-warning" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
