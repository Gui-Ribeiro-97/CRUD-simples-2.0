<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Coleção')</title>

    {{-- Link para o CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="cabecalho">
        <h1>🎯 Sistema de Colecionáveis</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="rodape">
        <p>&copy; 2025 - Feito com Laravel</p>
    </footer>
</body>
</html>
