@extends('layouts.app')

/* debug
@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-warning" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
*/
@section('content')
    <div class="container">
        <h2>Criar Nova Planta</h2>
        <form action="{{ route('pl_create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="data_plantacao">Data da Plantação:</label>
                <input type="text" class="form-control" id="data_plantacao" name="data_plantacao" required>
            </div>
            <div class="form-group">
                <label for="hora_rega">Hora das Regas:</label>
                <input type="text" class="form-control" id="hora_rega" name="hora_rega" required>
            </div>
            <div class="form-group">
                <label for="ultima_rega">Hora da última rega:</label>
                <input type="text" class="form-control" id="ultima_rega" name="ultima_rega" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="A">Ativo</option>
                    <option value="D">Desativado</option>
                </select>
            </div>
            <div><hr></div>
            <div class="form-group">
                <label for="id_arduino">Arduino ID :</label>
                <select class="form-control" name="id_arduino" id="id_arduino" required>
                    <option>Selecione</option>
                    @foreach ($controladoras as $controladora)
                        <option value="{{ $controladora->id }}">{{ $controladora->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="porta_arduino">Arduino Porta:</label>
                <select class="form-control" name="porta_arduino" id="porta_arduino" required>
                    <option>Selecione</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('pl_index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $('#id_arduino').change(function() {
                $.ajax({
                    url: '/controladoras/get_portas/' + $('#id_arduino').val(),
                    type: 'GET',
                    success: function (data) {
                        // Limpe as opções existentes
                        $('#porta_arduino').empty();

                        var parsedData = JSON.parse(data);

                        $.each(parsedData, function (index, obj) {
                            $('#porta_arduino').append($('<option>', {
                                value: obj.id,
                                text: obj.nome
                            }));
                        });
                    },
                    error: function (error) {
                        console.log('Ocorreu um erro: ' + error);
                    }
                });
            })
    });
    </script>
@endsection

