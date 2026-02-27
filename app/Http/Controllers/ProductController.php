<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Condition;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = Product::with(['brand', 'condition'])->orderBy('name', 'desc')->paginate(10); // 10 per side
        return view('products.index', compact('products'));
    }

    // Show products per brand
    public function brand(Brand $brand)
    {
        $products = $brand->products()
            ->with('condition')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('products.index', compact('products', 'brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $conditions = Condition::all();
        return view('products.create', compact('brands', 'conditions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'condition_id' => 'required|exists:conditions,id',
            'price' => 'required|numeric|min:0',
            'in_stock' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produkt skapad!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $conditions = Condition::all();

        return view('products.edit', compact('product', 'brands', 'conditions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'condition_id' => 'required|exists:conditions,id',
            'price' => 'required|numeric|min:0',
            'in_stock' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produkt uppdaterad!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produkt borttagen!');
    }
}
