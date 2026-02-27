<h1>Update</h1>
<h2>{{ $product->name }}</h2>

<form method="POST" action="{{ route('product.update', ['product' => $product->id]) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product->name }}">

    <button type="submit">Save</button>
</form>

<form method="POST" action="{{ route('product.destroy', $product->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Remove</button>
</form>