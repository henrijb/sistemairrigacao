 <header>
        <nav>
            <div class="navbar-container">
                <div class="navbar-brand">
                    <img src="{{ asset('imagens/bonsai.png') }}" alt="Logo">
                    <span class="brand-title">Sistema de Irrigação</span>
                </div>
                <ul class="navbar-menu">
                    <li><a href="{{ route('home.index') }}">Página Inicial</a></li>
                    <li><a href="{{ route('pl_index') }}">Plantas</a></li>
                    <li><a href="{{ route('us_index') }}">Usuário</a></li>
                    <li><a href="{{ route('ct_index') }}">Controladora</a></li>
                </ul>
            </div>
        </nav>
    </header>