<h1>Edit Product</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- uppdate name --}}
    <div>
    <label>Name:</label>
    <input type="text" name="name" value="{{ $product->name }}">
</div>

    {{-- uppdate cat --}}
    <div>
    <label>Brand:</label>
    <select name="brand_id">
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}"
                {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>
    </div>

{{-- uppdate cond --}}

<div>
    <label>Condition:</label>
    <select name="condition_id">
        @foreach($conditions as $condition)
            <option value="{{ $condition->id }}"
                {{ $product->condition_id == $condition->id ? 'selected' : '' }}>
                {{ $condition->name }}
            </option>
        @endforeach
    </select>
</div>

    {{-- uppdate price --}}
<div>
    <label>Price:</label>
    <input type="number" name="price" value="{{ $product->price }}">
</div>

<div>
    <label>
        <input type="checkbox" name="in_stock" value="1"
            {{ $product->in_stock ? 'checked' : '' }}>
        In stock
    </label>
</div>

{{-- update buttom --}}


    <button type="submit">Update</button>
</form>

<hr>

{{-- delete --}}
<form action="{{ route('products.destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Product</button>
</form>