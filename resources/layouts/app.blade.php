<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Projeto</title>

    <!-- Inclua seus arquivos CSS aqui -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Inclua qualquer script JavaScript necessário aqui -->
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Página Inicial</a></li>
                <li><a href="/sobre">Sobre</a></li>
                <li><a href="/contato">Contato</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content') <!-- Esta seção será substituída pelo conteúdo de cada página -->
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Seu Projeto. Todos os direitos reservados.</p>
    </footer>

    <!-- Inclua seus scripts JavaScript aqui, se necessário -->
</body>
</html>