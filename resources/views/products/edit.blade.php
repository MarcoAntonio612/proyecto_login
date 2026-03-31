<h1>Editar Producto</h1>

<form action="/products/{{ $product->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product->name }}"><br><br>

    <textarea name="description">{{ $product->description }}</textarea><br><br>

    <input type="number" step="0.01" name="price" value="{{ $product->price }}"><br><br>

    <input type="number" name="stock" value="{{ $product->stock }}"><br><br>

    <button type="submit">Actualizar</button>
</form>