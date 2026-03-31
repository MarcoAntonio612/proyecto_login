<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Tiendita</title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<nav style="background:#333; color:#fff; padding:10px;">
    
    <a href="/" style="color:white; margin-right:10px;">Inicio</a>

    @auth
    <span style="margin-right:10px;">
        👤 {{ auth()->user()->name }} ({{ auth()->user()->role }})
        </span>

        <a href="{{ route('cart.index') }}">Ver carrito</a>

        @if(auth()->user()->role === 'admin')
            <a href="/products/create" style="color:white; margin-right:10px;">Crear Producto</a>
        @endif

        <form action="/logout" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    @else
        <a href="/login" style="color:white; margin-right:10px;">Login</a>
        <a href="/register" style="color:white;">Registro</a>
    @endauth

</nav>

<div style="padding:20px;">
    @yield('content')
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>