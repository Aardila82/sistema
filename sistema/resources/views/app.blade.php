<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema')</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- Aplilar estilos CSS -->
    @stack('css')
</head>
<body>
    <header>
        <h1 class="text-rojo">Bienvenido a mi sisistema</h1>
    </header>
    <!--Incluir el menu desde un archivo parcial -->
    @include('partials.menu')
    <main>
        @yield('contenido')
    </main>

    <footer>
        2025 - Sistema
    </footer>

    <!--Aplilar scripts -->

    @stack('scripts')
</body>
</html>
