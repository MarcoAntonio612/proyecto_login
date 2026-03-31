@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4 text-center">🛒 Carrito de Compras</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('cart') && count(session('cart')) > 0)

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">

                <thead class="table-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                    @php $total = 0; @endphp

                    @foreach(session('cart') as $id => $item)
                        @php 
                            $subtotal = $item['price'] * $item['quantity']; 
                            $total += $subtotal;
                        @endphp

                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $item['image']) }}" 
                                     class="img-thumbnail"
                                     style="width:80px; height:80px; object-fit:cover;">
                            </td>

                            <td>{{ $item['name'] }}</td>

                            <td class="text-success fw-bold">
                                ${{ $item['price'] }}
                            </td>

                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex justify-content-center">
                                    @csrf

                                    <button name="quantity" value="{{ $item['quantity'] - 1 }}" 
                                            class="btn btn-outline-secondary btn-sm">
                                        -
                                    </button>

                                    <span class="mx-2 align-self-center">
                                        {{ $item['quantity'] }}
                                    </span>

                                    <button name="quantity" value="{{ $item['quantity'] + 1 }}" 
                                            class="btn btn-outline-secondary btn-sm">
                                        +
                                    </button>
                                </form>
                            </td>

                            <td class="fw-bold">
                                ${{ $subtotal }}
                            </td>

                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- TOTAL -->
        <div class="d-flex justify-content-end">
            <div class="card p-3 shadow-sm" style="width: 300px;">
                <h4 class="text-end">
                    Total: <span class="text-success">${{ $total }}</span>
                </h4>
            </div>
        </div>

        <!-- ACCIONES -->
        <div class="d-flex justify-content-between mt-3">

            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="btn btn-warning">
                    🧹 Vaciar carrito
                </button>
            </form>

            <a href="/" class="btn btn-secondary">
                ⬅ Seguir comprando
            </a>

        </div>

        <!-- FINALIZAR COMPRA -->
        <div class="text-end mt-3">
            <button class="btn btn-success">
                💳 Finalizar compra
            </button>
        </div>

    @else
        <div class="alert alert-warning text-center">
            🛒 Tu carrito está vacío
        </div>
    @endif

</div>

@endsection