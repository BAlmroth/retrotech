<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::withCount('products')->get();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
        ], [
            'name.unique' => 'Could not create brand, a brand with this name already exists.',
        ]);

        try {
            Brand::create($validated);
            return redirect()->route('brands.index')->with('success', 'Brand created!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went wrong, could not save the brand.');
        }
    }

    public function show(Brand $brand)
    {
        $products = $brand->products()->with('condition')->orderBy('created_at', 'desc')->paginate(10);
        return view('brands.show', compact('brand', 'products'));
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
        ], [
            'name.unique' => 'Could not update brand, a brand with this name already exists.',
        ]);

        try {
            $brand->update($validated);
            return redirect()->route('brands.index')->with('success', 'Brand updated!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went wrong while updating.');
        }
    }

    public function destroy(Brand $brand)
    {
        if ($brand->products()->exists()) {
            return redirect()->back()->with('error', 'Cannot delete brand — it has products assigned to it.');
        }

        try {
            $brand->delete();
            return redirect()->route('brands.index')->with('success', 'Brand deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong, could not delete brand.');
        }
    }

    public function confirmDelete(Brand $brand)
    {
        $brand->loadCount('products');
        return view('brands.confirm-delete', compact('brand'));
    }
}
