<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use App\Models\Brand;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function index(Request $request)
    {
        $query = Product::with(['brand', 'condition']);

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->filled('condition_id')) {
            $query->where('condition_id', $request->condition_id);
        }

        $products = $query->orderBy('name', 'desc')->paginate(6)->withQueryString();
        $user = Auth::user();
        $brands = Brand::all();
        $conditions = Condition::all();

        return view('dashboard', compact('products', 'user', 'brands', 'conditions'));
    }


    public function __invoke(Request $request)
    {
        $user = Auth::user();

        return view('dashboard', [
            'user' => $user
        ]);
    }
}
