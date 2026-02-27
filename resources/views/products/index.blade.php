<h1>Products</h1>

@foreach ($products as $product)
    <h3>{{ $product->name }}</h3>
    <p>Brand: {{ $product->brand->name }}</p>   
    <p>Condition: {{ $product->condition->name }}</p>
    <p>Price: {{ $product->price }} kr</p>
@endforeach

{{ $products->links() }}