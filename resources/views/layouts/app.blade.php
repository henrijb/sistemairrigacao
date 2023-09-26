<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Henrique J Berto">
    <title>Sistema de Irrigação</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    @include('layouts.navbar')

    <main>
        <div class="container">
            @if(isset ($errors) && count($errors) > 0)
                <div class="alert alert-warning" role="alert">
                    <ul class="list-unstyled mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Sistema de Irrigação. Todos os direitos reservados.</p>
    </footer>

    <!-- javaScript aqui -->
    <script>
        $(document).ready(function () {
            $('#id_arduino').change(function() {
                $.ajax({
                    url: '/controladoras/get_portas/' + $('#id_arduino').val(),
                    type: 'GET',
                    success: function (data) {
                        // Limpe as opções existentes
                        $('#porta_arduino_analogica').empty();
                        $('#porta_arduino_digital').empty();

                        var parsedData = JSON.parse(data);

                        $.each(parsedData, function (index, obj) {
                            if(obj.tipo == 'A') {
                                $('#porta_arduino_analogica').append($('<option>', {
                                    value: obj.id,
                                    text: obj.nome
                                }));
                            }

                            if(obj.tipo == 'D') {
                                $('#porta_arduino_digital').append($('<option>', {
                                    value: obj.id,
                                    text: obj.nome
                                }));
                            }

                        });
                    },
                    error: function (error) {
                        console.log('Ocorreu um erro: ' + error);
                    }
                });
            })
        });
    </script>
</body>
</html>
