<div class="products-index">

    <div class="index-header">
        <h2>Products</h2>
        <form method="GET" action="{{ route('products.create') }}">
            <button class="button-main" type="submit">+ Add Product</button>
        </form>
    </div>

    <form class="filter-bar" method="GET" action="{{ $filterRoute }}">
    <select name="brand_id">
        <option value="">All Brands</option>
        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>

    <select name="condition_id">
        <option value="">All Conditions</option>
        @foreach ($conditions as $condition)
            <option value="{{ $condition->id }}" {{ request('condition_id') == $condition->id ? 'selected' : '' }}>
                {{ $condition->name }}
            </option>
        @endforeach
    </select>

    <select name="sort">
        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
    </select>

    <button class="button-main" type="submit">Filter</button>
    <a class="button-clear" href="{{ $filterRoute }}">Clear</a>
</form>

    <table class="products-table">
        <thead>
            <tr>
                <th>#id</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Condition</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr data-href="{{ route('products.show', $product->id) }}">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->brand->name }}</td>
                <td>{{ $product->condition->name }}</td>
                <td>{{ $product->price }} kr</td>
                <td class="desc">{{ Str::limit($product->description, 60) }}</td>
                <td class="actions">
                    <a href="{{ route('products.show', $product->id) }}">View</a>
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <a href="{{ route('products.confirmDelete', $product->id) }}" class="danger">Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="empty">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $products->links() }}

</div> 
{{-- screen jump stop --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        window.scrollTo(0, sessionStorage.getItem('scrollPos') || 0);
        sessionStorage.removeItem('scrollPos');

        document.querySelectorAll('.filter-bar, a').forEach(el => {
            el.addEventListener('click', () => {
                sessionStorage.setItem('scrollPos', window.scrollY);
            });
        });

        //entire row clickable, but not edit and delete
        document.querySelectorAll('tr[data-href]').forEach(row => {
            row.addEventListener('click', (e) => {
                if (!e.target.closest('a')) {
                    window.location = row.dataset.href;
                }
            });
        });
    });
</script>