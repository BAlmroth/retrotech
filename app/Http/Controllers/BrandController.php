<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function show(Brand $brand)
{
    $products = $brand->products;
    return view('brands.show', compact('brand', 'products'));
}
}
