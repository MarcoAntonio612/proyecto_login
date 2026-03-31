@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1 class="mb-4 text-center">🛍️ Productos</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">

        @foreach ($products as $product)
            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100">

                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top"
                             style="height:200px; object-fit:cover;">
                    @endif

                    <div class="card-body text-center">

                        <h5 class="card-title">{{ $product->name }}</h5>

                        <p class="card-text text-muted">
                            {{ $product->description }}
                        </p>

                        <p class="text-success fw-bold fs-5">
                            ${{ $product->price }}
                        </p>

                        <!-- Ver producto -->
                        <a href="/products/{{ $product->id }}" 
                           class="btn btn-outline-secondary btn-sm mb-2">
                            Ver producto
                        </a>

                        @auth
                            <!-- Agregar al carrito -->
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary w-100 mb-2">
                                    🛒 Agregar al carrito
                                </button>
                            </form>
                        @else
                            <a href="/login" class="btn btn-warning w-100 mb-2">
                                Inicia sesión para comprar
                            </a>
                        @endauth

                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <hr>

                            <!-- Botones admin -->
                            <a href="/products/{{ $product->id }}/edit" 
                               class="btn btn-warning btn-sm">
                                ✏️ Editar
                            </a>

                            <form action="/products/{{ $product->id }}" 
                                  method="POST" 
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        @endif

                    </div>

                </div>

            </div>
        @endforeach

    </div>

</div>

@endsection