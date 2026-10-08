<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Reads & Thoughts</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="navbar">
        <a href="{{ url('/') }}" class="brand-logo">Lumina</a>
        
        <nav class="nav-links">
            <a href="{{ route('home') }}" class="nav-item">Inicio</a>
            <a href="{{ route('about') }}" class="nav-item">Nosotros</a>
            <a href="{{ route('simulation') }}" class="nav-item">Simulación</a>
            
            <button id="theme-toggle" class="btn-theme">Modo Oscuro</button>

            @guest
                <a href="{{ route('login') }}" class="btn-primary">Iniciar Sesión</a>
            @else
                <a href="{{ route('dashboard') }}" class="nav-item">Mi Panel</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-theme">Salir</button>
                </form>
            @endguest
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>