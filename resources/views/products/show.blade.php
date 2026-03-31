@extends('layouts.app')

@section('content')

<h1>{{ $product->name }}</h1>

<p>{{ $product->description }}</p>
<p><strong>$ {{ $product->price }}</strong></p>

@auth
    <button>Comprar</button>
@else
    <a href="/login">Inicia sesión para comprar</a>
@endauth

@endsection