<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Condition;

class ProductController extends Controller
{

     //Display a listing of the resource.

    public function index(Request $request)
    {
        $query = Product::with(['brand', 'condition']);

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->filled('condition_id')) {
            $query->where('condition_id', $request->condition_id);
        }

        $sort = $request->get('sort', 'newest');
        $products = $query->sorted($sort)->paginate(15)->withQueryString();
        $brands = Brand::all();
        $conditions = Condition::all();

        return view('products.index', compact('products', 'brands', 'conditions'));
    }



     //Show the form for creating a new resource.

    public function create()
    {
        $brands = Brand::all();
        $conditions = Condition::all();
        return view('products.create', compact('brands', 'conditions'));
    }


     //Store a newly created resource in storage.

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'condition_id' => 'required|exists:conditions,id',
            'price' => 'required|numeric|min:0|max:100000000',
            'description' => 'nullable|string',
        ]);

        try {
            Product::create($validated);
            return redirect('/products')->with('success', 'Product created');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong, could not save the product.');
        }
    }


    //  display the specified resource.
     
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }


    //  Show the form for editing the specified resource.

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $conditions = Condition::all();

        return view('products.edit', compact('product', 'brands', 'conditions'));
    }


     //Update the specified resource in storage.

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'condition_id' => 'required|exists:conditions,id',
            'price' => 'required|numeric|min:0|max:100000000',
            'description' => 'nullable|string',
        ]);

        try {
            $product->update($validated);
            return redirect()->route('products.index')
                ->with('success', 'Product updated!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong while updating.');
        }
    }


    //  remove the specified resource from storage.
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')
                ->with('success', 'Product is deleted!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong, could not delete product.');
        }
    }

    public function confirmDelete(Product $product)
    {
        return view('products.confirm-delete', compact('product'));
    }
}
